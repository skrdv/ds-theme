<?php
function ds_scripts() {
	wp_enqueue_style( 'ds-bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.min.css' );
	wp_enqueue_style( 'ds-lens', get_template_directory_uri() . '/assets/css/lens.css' );
	wp_enqueue_style( 'ds-style', get_template_directory_uri() . '/assets/css/styles.css' );
	wp_enqueue_style( 'ds-desktop', get_template_directory_uri() . '/assets/css/desktop.css' );
  wp_enqueue_script('ds-bootstrap-js', get_template_directory_uri().'/assets/js/bootstrap.min.js', array('jquery') );
  wp_enqueue_script('ds-scripts', get_template_directory_uri().'/assets/js/scripts.js', array('jquery') );
}
add_action( 'wp_enqueue_scripts', 'ds_scripts' );


function parameter_queryvars( $qvars ) {
	$qvars[] = 'article';
	return $qvars;
}
add_filter('query_vars', 'parameter_queryvars' );

function my_fuzzy_threshold() {
  return 10;
}
add_filter( 'searchwp_fuzzy_threshold', 'my_fuzzy_threshold' );



/**
 * function will chmod dirs and files recursively
 * @param type $start_dir
 * @param type $debug (set false if you don't want the function to echo)
 */
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




function array_combine_($keys, $values){
    $result = array();

    foreach ($keys as $i => $k) {
     $result[$k][] = $values[$i];
     }

    array_walk($result, function(&$v){
     $v = (count($v) == 1) ? array_pop($v): $v;
     });

    return $result;
}










function my_acf_save_post( $post_id ) {

	WP_Filesystem();
	// $updir	 	= wp_upload_dir();
	$debug 		= get_field('debug');
	$upload 	= wp_upload_dir()['path'];
	$zipname	= get_field('article-zip')['filename'];
	$filename = str_replace('.', '', substr($zipname, 0, -4));
	$filearray = array();

	$xml = simplexml_load_file($upload.'/'.$filename.'.xml');
	foreach ($xml->body->sec as $key1 => $value) {
		$filearray[$key1] = $value;
		foreach ($value as $key2 => $value) {
			$filearray[$key1][$key2] = $value;
			foreach ($value as $key3 => $value) {
				$filearray[$key1][$key2][$key3] = $value;
			}
		}
	}
	$filecontent = json_encode($filearray);
	var_dump($filecontent);



	// $postupdate = array('ID' => $post->ID, 'post_title' => $xmltitle);
	// wp_update_post( $postupdate );

	update_field('debug', $filename);
	update_field('article-xml', $filename.'.xml');
	update_field('article-pdf', $filename.'.pdf');
	update_field('article-text', $filecontent);

	// debug
  if ( $unzip ) {
    $message = 'Successfully unzipped the file!';
  } else {
    $message = 'There was an error unzipping the file.';
  }
	// chmod_recursive($upload_path, false);

}
add_action('acf/save_post', 'my_acf_save_post', 20);
