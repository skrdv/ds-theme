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
	wp_enqueue_style( 'ds-desktop', get_template_directory_uri() . '/assets/css/desktop.css' );
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

	// WP
	WP_Filesystem();
	$rootPATH		 = get_home_path();
	$uploadPATH  = wp_upload_dir()['path'];

	// ACF
	$articleZIP  = get_field('article-zip');
	$articleXML	 = get_field('article-xml');
	$articlePDF	 = get_field('article-pdf');
	$xmlCONTENT	 = get_field('article-text');

	// Check ZIP
	if (!$articleZIP) {
		// error message
	} else {
		$articleFILE = $articleZIP['filename'];
		$articleNAME = str_replace('.', '', substr($articleFILE, 0, -4));
		$articleSLUG = get_post_field( 'post_name', get_post() );
		$articleUNZIP = unzip_file( $uploadPATH.'/'.$articleFILE, $uploadPATH);
		// $articleUNZIP = unzip_file( $uploadPATH.'/'.$articleFILE, $rootPATH.'/digital-science/'.$articleSLUG);
		chmod_recursive($uploadPATH, false);
		update_attached_file( $articleZIP, $articleUNZIP );
	}

	// Check PDF
	if (!$articlePDF && $articleNAME) {
		$articlePDF = $articleNAME.'.pdf';
	} elseif ($articlePDF && !$articleNAME) {
		$articlePDF = '';
	} else {
		// check file existing
	}

	// Check XML
	if (!$articleXML && $articleNAME) {
		$articleXML = $articleNAME.'.xml';
	} elseif ($articleXML && !$articleNAME) {
		$articleXML = '';
	} else {
		// check file existing
	}

	// Get XML
	$xmlFILE = simplexml_load_file($uploadPATH.'/'.$articleXML);
	// $xmlSTRING = simplexml_load_string($uploadPATH.'/'.$articleXML);
	// $xmlJSON = json_encode($xmlSTRING);
	// $xmlARRAY = json_decode($xmlJSON, TRUE);

	// Set TITLE
	// $journalMeta  = 'journal-meta';
	// $journalGroup = 'journal-title-group';
	// $journalTitle = 'journal-title';
	$articleMeta  = 'article-meta';
	$articleGroup = 'title-group';
	$articleTitle = 'article-title';
	// $journalTITLE = $xmlFILE->front->{$journalMeta}->{$journalGroup}->{$journalTitle};
	$articleTITLE = $xmlFILE->front->{$articleMeta}->{$articleGroup}->{$articleTitle};
	$postUPDATE = array( 'ID' => $post_id, 'post_title' => $articleTITLE );
	wp_update_post( $postUPDATE );

	// Parse ARRAY
	// $xmlARRAY	= array();
	// foreach ($xmlFILE->body->sec as $key1 => $value) {
	// 	$xmlARRAY[$key1] = $value;
	// 	foreach ($value as $key2 => $value) {
	// 		$xmlARRAY[$key2] = $value;
	// 		foreach ($value as $key3 => $value) {
	// 			$xmlARRAY[$key3] = $value;
	// 		}
	// 	}
	// }

	// Set CONTENT
	if (!$xmlCONTENT && $articleNAME) {
		// $xmlCONTENT = json_decode($xmlARRAY);
	} elseif ($xmlCONTENT && !$articleNAME) {
		$xmlCONTENT = '';
	} else {
		// check file existing
	}


	// Check TIF
	// count images


	// Update ACF
	update_field('debug', '');
	update_field('article-xml', $articleXML);
	update_field('article-pdf', $articlePDF);
	update_field('article-text', $xmlCONTENT);

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
