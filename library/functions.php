<?php

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

	WP_Filesystem();
	$updir	 	= wp_upload_dir();
	$upload 	= $updir['path'];
	$debug 		= get_field('debug');
	$zipname	= get_field('article-zip')['filename'];
	$filename = str_replace('.', '', substr($zipname, 0, -4));
	$xml	 		= simplexml_load_file($upload.'/'.$filename.'.xml');

	$xmlarray = array();
	foreach ($xml->body->sec as $key1 => $value) {
		$xmlarray[$key1] = $value;
		foreach ($value as $key2 => $value) {
			$xmlarray[$key1][$key2] = $value;
			foreach ($value as $key3 => $value) {
				$xmlarray[$key1][$key2][$key3] = $value;
			}
		}
	}
	$xmlcontent = json_encode($xmlarray);

	// $postupdate = array('ID' => $post->ID, 'post_title' => $xmltitle);
	// wp_update_post( $postupdate );


	var_dump($xmlcontent);


	update_field('debug', $filename);
	update_field('article-xml', $filename.'.xml');
	update_field('article-pdf', $filename.'.pdf');
	update_field('article-text', $xmlcontent);

	// debug
  if ( $unzip ) {
    $message = 'Successfully unzipped the file!';
  } else {
    $message = 'There was an error unzipping the file.';
  }
	// chmod_recursive($upload_path, false);

}
add_action('acf/save_post', 'my_acf_save_post', 20);
