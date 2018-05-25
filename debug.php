<?php
/**
 * Template Name: Debug
 */
?>



<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php the_title(); ?></title>

  <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,400italic,600italic' rel="stylesheet">
  <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

  <link href="<?php echo get_template_directory_uri(); ?>/assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo get_template_directory_uri(); ?>/assets/css/lens.css" rel="stylesheet">
  <link href="<?php echo get_template_directory_uri(); ?>/assets/css/styles.css" rel="stylesheet">
  <link href="<?php echo get_template_directory_uri(); ?>/assets/css/debug.css" rel="stylesheet">

  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/bootstrap.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/scripts.js"></script>

</head>
<body>

  <header>
    <div class="navbar">
      <a href="/" class="navbar-brand">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-header.png" alt="Microbiology Society">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
    </div>
    <div class="bread">
      <div class="item">Home</div>
      <div class="item">Journal of Medical Microbiology</div>
      <div class="item">Volume 59, Issue 11</div>
      <div class="item active">Article</div>
    </div>
  </header>

	<div class="debug">
		<?php

    // Get folders
  	WP_Filesystem();
  	$rootPath		 = get_home_path();
  	$uploadPath  = wp_upload_dir()['path'];
    $articleSlug = get_post_field( 'post_name', get_post() );
    $articlePath = $rootPath.'digital-science/'.$articleSlug;

		// Get files
    $articleFile = 'mic.000286.zip';
		$articleName = str_replace('.', '', substr($articleFile, 0, -4));
    $articleXml = $articleName.'.xml';

    // Unzip archive
    // $articleUnzip = unzip_file( $uploadPath.'/'.$articleFile, $articlePath);
		// chmod_recursive($articlePath, true);
		// update_attached_file($articleZip, $articleUnzip);
    // if ($articleUnzip) {
    //   echo 'Unzip succesfully!<br>';
    // } else {
    //   echo 'Unzip error!<br>';
    // }

    // Check ImageMagick
    // if (extension_loaded('imagick')) {
    //   echo 'ImageMagick Loaded';
    // } else {
    //   echo 'Extension ImageMagick not found by extension_loaded';
    // }
    // phpinfo();

    // Convert images
    $imagesArrayFiles = array();
    $imagesTif = glob($articlePath.'/*.tif');
    foreach($imagesTif as $image) {
      $imageName = str_replace($articlePath.'/', '', substr($image, 0, -4));
      array_push($imagesArrayFiles, $imageName);
      $im = new imagick($image);
      $im->writeImage($articlePath.'/'.$imageName.'.png');
    }

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
      $image->setAttributeNS('http://www.w3.org/1999/xlink', 'href', $imagePng);
    }
    $dom->saveXML();
    $dom->save($articlePath.'/'.$articleName.'PNG.xml');

    // Check images
    // if ($imagesArrayXml == $imagesArrayFiles) {
    //   echo 'All images exists in archive!';
    // } else {
    //   echo 'Not enough images in archive!';
    // }


    // PARSE XML
    $xmlFile = simplexml_load_file($articlePath.'/'.$articleXml);
    // print_r($xmlFile);

		// Get Journal Meta
		$journalTitle = $xmlFile->front->{'journal-meta'}->{'journal-title-group'}->{'journal-title'};
		$journalIssn = $xmlFile->front->{'journal-meta'}->{'issn'}[0];

		$journalPublisher = $xmlFile->front->{'journal-meta'}->{'publisher'}->{'publisher-name'};

    // Get Article Title
		$articleTitle = $xmlFile->front->{'article-meta'}->{'title-group'}->{'article-title'};
		$articleTitleItalic = $xmlFile->front->{'article-meta'}->{'title-group'}->{'article-title'}->{'italic'};
    $articleTitleFull = $articleTitle.' '.$articleTitleItalic;

    // Get Article Meta
    $articleId = $xmlFile->front->{'article-meta'}->{'article-id'};
    $articleDoi = $articleId[1];
    $articleDoiArray = array();

    foreach ($articleDoi as $key => $value) {
      // if ($key == 0) {
      echo $value;
        $articleDoi = $value;
        array_push($articleDoiArray, $value);
      // }
    }
    // print_r($articleDoi);
    echo $articleDoi;


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
    $articleAbstractFull = $articleAbstractString;

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
    $articleBodyFull = $articleBodyString;

    // Show VARS
    echo '<br><br><strong>PARSE XML</strong><br>';
    echo '<strong>Slug:</strong> '.$articleSlug.'<br>';
    echo '<strong>Path:</strong> '.$articlePath.'<br>';
    echo '<br>';
    echo '<strong>Journal:</strong> '.$journalTitle.'<br>';
    echo '<strong>Publisher:</strong> '.$journalPublisher.'<br>';
    echo '<strong>ISSN:</strong> '.$journalIssn.'<br>';
    echo '<strong>DOI:</strong> '.$articleDoi.'<br>';
    echo '<strong>Title:</strong> '.$articleTitleFull.'<br>';
    echo '<strong>Authors:</strong> '.$articleAuthorsList.'<br>';
    echo '<strong>Date Pub:</strong> '.$articlePubDateFull.'<br>';
    echo '<strong>Date Received:</strong> '.$articleReceivedDateFull.'<br>';
    echo '<strong>Date Accepted:</strong> '.$articleAcceptedDateFull.'<br>';
    echo '<strong>Abstract:</strong><br> '.$articleAbstractFull.'<br>';
    echo '<strong>Body:</strong><br> '.$articleBodyFull.'<br>';
    echo '<br>';

    // print_r($articleAbstract);





		?>
	</div>

<?php while (have_posts()): the_post(); ?>

  <main role="main">

    <div class="intro hidden" data-toggle="sticky-onscroll">
      <div class="intro-meta"><?php the_field('article-date'); ?></div>
      <h1 class="intro-title"><?php the_title(); ?></h1>
      <div class="intro-authors"><?php the_field('article-authors'); ?></div>
      <div class="intro-pdf">
        <a class="btn btn-primary" href="<?php echo wp_upload_dir()['baseurl'].'/'.get_field('article-pdf'); ?>" target="_blank">PDF 753kB</a>
        <!-- <a class="intro-tweet" href="#">Tweet</a> -->
      </div>
    </div>

    <div class="article-content hidden"></div>

    <div class="lens">
      <!-- <iframe src="//ds.skrdv.com/lens/?article=326" width="900" height="1400"></iframe> -->
    </div>

  </main>

<?php endwhile; ?>

<div class="more-like">
	<h3>More like this ...</h3>
	<?php
	$last_posts = new WP_Query;
	$moreLikeThis = $last_posts->query( array(
		'post_type' => 'post',
		'posts_per_page' => '4'
	) );
	?>
	<div class="container test">
		<?php foreach( $moreLikeThis as $post ){ ?>
      <div class="item">
        <div class="cardArticle">
  				<div class="cardArticle-body">
  					<div class="cardArticle-date">
              <?php the_field('article-date', $post->ID); ?>
            </div>
  					<a class="cardArticle-title" data-toggle="modal" data-slide="" data-target="#exampleModalCenter">
  						<?php echo esc_html( $post->post_title ); ?>
  					</a>
  					<div class="cardArticle-persons">
  						<?php the_field('article-authors', $post->ID); ?>
            </div>
  					<a class="cardArticle-counts">
  						<img src="http://ds.skrdv.com/wp-content/themes/ds-theme/assets/img/counts.png">
  					</a>
  				</div>
  			</div>
      </div>
		<?php } ?>
	</div>
</div>

<?php get_footer(); ?>
