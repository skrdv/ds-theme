<?php

// File permissions
function chmod_recursive($start_dir, $debug = true) {
    $dir_perms = 0755;
    $file_perms = 0755;

    $str = "";
    $files = array();
    if (is_dir($start_dir)) {
        $fh = opendir($start_dir);
        while (($file = readdir($fh)) !== false) {
            // skip hidden files and dirs and recursing if necessary
            if (strpos($file, '.')=== 0) continue;

            $filepath = $start_dir . '/' . $file;
            if ( is_dir($filepath) ) {
                //$newname = sanitize_file_name($filepath);
                echo $str = "chmod $filepath To $dir_perms\n";
                chmod($filepath, $dir_perms);
                chmod_recursive($filepath);
            } else {
                ////$newname = sanitize_file_name($filepath);
                echo $str = "chmod $filepath tp $file_perms\n";
                chmod($filepath, $file_perms);
            }
        }
        closedir($fh);
    }
    if ($debug) {
        echo $str.'<br	>';
    }
}

// Styles, scripts
function ds_scripts() {
	wp_enqueue_style( 'ds-bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.min.css' );
	wp_enqueue_style( 'ds-lens', get_template_directory_uri() . '/assets/css/lens.css' );
	wp_enqueue_style( 'ds-style', get_template_directory_uri() . '/assets/css/styles.css' );
	wp_enqueue_style( 'ds-desktop', get_template_directory_uri() . '/assets/css/debug.css' );

  wp_enqueue_script('ds-bootstrap-js', get_template_directory_uri().'/assets/js/bootstrap.min.js', array('jquery') );
  wp_enqueue_script('ds-scripts', get_template_directory_uri().'/assets/js/scripts.js', array('jquery') );
}
add_action( 'wp_enqueue_scripts', 'ds_scripts' );

// Article vars
function parameter_queryvars( $qvars ) {
	$qvars[] = 'article';
	return $qvars;
}
add_filter('query_vars', 'parameter_queryvars' );

// Search hook
function my_fuzzy_threshold() {
  return 10;
}
add_filter( 'searchwp_fuzzy_threshold', 'my_fuzzy_threshold' );





// Update post
function my_acf_save_post( $post_id ) {

	// Get folders
  WP_Filesystem();
  $rootPath		 = get_home_path();
  $uploadPath  = wp_upload_dir()['path'];
  //$articleSlug = get_post_field( 'post_name', get_post() );
  $articleSlug	= $post_id;
  $articlePath = $rootPath.'digital-science/'.$articleSlug;

	// Get fields
	$articleZip      = get_field('article-zip');
	$articleXml	     = get_field('article-xml');
	$articlePdf	     = get_field('article-pdf');
	$articleDate     = get_field('article-date');
	$articleAuthors  = get_field('article-authors');
	$articleArstract = get_field('article-abstract');
  $articleBody     = get_field('article-body');

	// Get archive
	if (!$articleZip) {
		/// check if archive exists
    /// error message and return
    $articleName = '';
	} else {
    // Delete all files
    $articleAllFiles = glob($articlePath.'/*');
    foreach($articleAllFiles as $file){
      if(is_file($file))
        unlink($file);
    }
    // Unzip archive
		$articleFile = $articleZip['filename'];
		$articleName = str_replace('.', '', substr($articleFile, 0, -4));
		$articleUnzip = unzip_file( $uploadPath.'/'.$articleFile, $articlePath);
    update_attached_file($articleZip, $articleUnzip);
    chmod_recursive($articlePath, false);
    // Check unzip archive
    // if ($articleUnzip) {
    //   echo 'Unzip succesfully!<br>';
    // } else {
    //   echo 'Unzip error!<br>';
    // }

	}

  // Check ImageMagick
  // if (extension_loaded('imagick')) {
  //   echo 'ImageMagick Loaded';
  // } else {
  //   echo 'Extension ImageMagick not found by extension_loaded';
  // }

  // Convert images
  $imagesArrayFiles = array();
  $imagesTif = glob($articlePath.'/*.tif');
  foreach($imagesTif as $image) {
    $imageName = str_replace($articlePath.'/', '', substr($image, 0, -4));
    array_push($imagesArrayFiles, $imageName);
    $im = new imagick($image);
    $im->writeImage($articlePath.'/'.$imageName.'.png');
  }

	// Check PDF
	if (!$articlePdf && $articleName) {
		$articlePdf = $articleName.'.pdf';
	} elseif ($articlePdf && !$articleName) {
		$articlePdf = '';
	} else {
		/// check file existing
	}

	// Check XML
	if (!$articleXml && $articleName) {
		$articleXml = $articleName.'.xml';

    // Edit XML
    $dom=new DOMDocument();
    $dom->load($articlePath.'/'.$articleXml);
    $root = $dom->documentElement;
    $images = $root->getElementsByTagName('graphic');
    $imagesArrayXml = array();
    foreach ($images as $image) {
      $imageSrc = $image->getAttributeNS('http://www.w3.org/1999/xlink', 'href');
      $imageName = str_replace('.', '', substr($imageSrc, 0, -4));
      array_push($imagesArrayXml, $imageName);
      $imagePng = $imageName.'.png';
      $imagePngPath = '/digital-science/'.$articleSlug.'/'.$imagePng;
      $image->setAttributeNS('http://www.w3.org/1999/xlink', 'href', $imagePngPath);
    }
    $dom->saveXML();
    $dom->save($articlePath.'/'.$articleName.'PNG.xml');
    $articleXmlPng = $articleName.'PNG.xml';
    $articleXml = $articleXmlPng;

	} elseif ($articleXml && !$articleName) {
		$articleXml = '';
	} else {
		/// check file existing
	}



  // Check images
  if ($imagesArrayXml == $imagesArrayFiles) {
    echo 'All images exists in archive!';
  } else {
    echo 'Not enough images in archive!';
  }

	// Parse XML
	$xmlFile = simplexml_load_file($articlePath.'/'.$articleXml);

  // Get Journal Meta
  $journalTitle = $xmlFile->front->{'journal-meta'}->{'journal-title-group'}->{'journal-title'};
  $journalIssn = $xmlFile->front->{'journal-meta'}->{'issn'}[0];
  $journalPublisher = $xmlFile->front->{'journal-meta'}->{'publisher'}->{'publisher-name'};

  // Get Article Title
  $articleTitle = $xmlFile->front->{'article-meta'}->{'title-group'}->{'article-title'};
  $articleTitleItalic = $xmlFile->front->{'article-meta'}->{'title-group'}->{'article-title'}->{'italic'};
  $articleTitleFull = $articleTitle.' '.$articleTitleItalic;

  // Get Article Authors
  $articleAuthorsArray = array();
  $articleAuthors = $xmlFile->front->{'article-meta'}->{'contrib-group'}->{'contrib'};
  foreach ($articleAuthors as $value) {
    $articleAuthorName = $value->name->{'given-names'};
    $articleAuthorSurname = $value->name->{'surname'};
    $articleAuthorFullName = $articleAuthorName.' '.$articleAuthorSurname;
    array_push($articleAuthorsArray, $articleAuthorFullName);
  }
  $articleAuthorsList = implode(', ', $articleAuthorsArray);
  $articleAuthors = $articleAuthorsList;

  // Get Article Dates
  $articlePubDateD = $xmlFile->front->{'article-meta'}->{'pub-date'}->{'day'};
  $articlePubDateM = $xmlFile->front->{'article-meta'}->{'pub-date'}->{'month'};
  $articlePubDateY = $xmlFile->front->{'article-meta'}->{'pub-date'}->{'year'};
  $articlePubDateFull = $articlePubDateD.'.'.$articlePubDateM.'.'.$articlePubDateY;
  $articleReceivedDateM = $xmlFile->front->{'article-meta'}->{'history'}->{'date'}[0]->{'month'};
  $articleReceivedDateD = $xmlFile->front->{'article-meta'}->{'history'}->{'date'}[0]->{'day'};
  $articleReceivedDateY = $xmlFile->front->{'article-meta'}->{'history'}->{'date'}[0]->{'year'};
  $articleReceivedDateFull = $articleReceivedDateD.'.'.$articleReceivedDateM.'.'.$articleReceivedDateY;
  $articleAcceptedDateM = $xmlFile->front->{'article-meta'}->{'history'}->{'date'}[1]->{'month'};
  $articleAcceptedDateD = $xmlFile->front->{'article-meta'}->{'history'}->{'date'}[1]->{'day'};
  $articleAcceptedDateY = $xmlFile->front->{'article-meta'}->{'history'}->{'date'}[1]->{'year'};
  $articleAcceptedDateFull = $articleAcceptedDateD.'.'.$articleAcceptedDateM.'.'.$articleAcceptedDateY;
  $articleDate = $articlePubDateFull;

  // Get Article Abstract
  $articleAbstractString = '';
  $articleAbstractArray = array();
  $articleAbstract = $xmlFile->front->{'article-meta'}->{'abstract'}->{'p'};
  foreach ($articleAbstract as $value) {
    $articleAbstractString .= $value.' ';
    foreach ($value->italic as $value) {
      $articleAbstractString .= '<i>'.$value.'</i>';
    }
  }
  $articleAbstract = $articleAbstractString;

  // Get Article Body
  $articleBodyString = '';
  $articleBodyArray = array();
  $articleBodySec = $xmlFile->body->sec;
  foreach ($articleBodySec as $value) {
    $articleBodySecTitle = '<u>'.$value->title.'</u><br>';
    $articleBodySecP = $value->p.'<br>';
    $articleBodyString .= $articleBodySecTitle.$articleBodySecP;
    // foreach ($value->italic as $value) {
    //   $articleBodyString .= '<i>'.$value.'</i>';
    // }
  }
  $articleBody = $articleBodyString;

  // Update Title
  $postUpdate = array( 'ID' => $post_id, 'post_title' => $articleTitle );
	wp_update_post( $postUpdate );

	// Update fields
	update_field('debug', $articlePath.'/'.$articleXml);
	update_field('article-xml', $articleXml);
	update_field('article-pdf', $articlePdf);
	update_field('article-date', $articleDate);
  update_field('article-authors', $articleAuthors);
	update_field('article-abstract', $articleAbstract);
  update_field('article-body', $articleBody);

}
add_action('acf/save_post', 'my_acf_save_post', 20);



// ERROR notice
function my_error_notice() {
    echo '<div class="error notice"><p>';
		echo _e( 'Error! Article not updated.', 'my_plugin_textdomain' );
		echo '</p></div>';
}
// add_action( 'admin_notices', 'my_error_notice' );

// UPDATE notice
function my_update_notice() {
    echo '<div class="updated notice"><p>';
		echo _e( 'Success! Article updated.', 'my_plugin_textdomain' );
		echo '</p></div>';
}
// add_action( 'admin_notices', 'my_update_notice' );


function article_update_after_creation( $post_id ) {
	$postUpdate = array( 'ID' => $post_id, 'post_name' => $post_id  );
	wp_update_post( $postUpdate );
		
	$tempinfo = get_post_meta( $post_id, 'wpcf-article-zip' );
	
	$attachment_id = attachment_url_to_postid( $tempinfo[0] );
	update_field('field_5af5637940ed5', $attachment_id, $post_id);
	
	update_meta( $post_id, 'wpcf-article-zip', '' );

}

add_action('cred_save_data','article_update_after_creation',10,2);