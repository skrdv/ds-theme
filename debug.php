<?php
/**
 * Template Name: Debug
 */
?>

<?php
WP_Filesystem();
$uploadPATH 	= wp_upload_dir()['path'];

if (isset($wp_query->query_vars['article'])) {
	$articleXML = get_field('article-xml', $wp_query->query_vars['article']);
} else {
	$articleXML = 'mic000286.xml';
}
$xmlPATH = '//ds.skrdv.com/wp-content/uploads/'.$articleXML;




// TITLE
// $journalMeta  = 'journal-meta';
// $journalGroup = 'journal-title-group';
// $journalTitle = 'journal-title';
// $articleTITLE = $xml->front->{$journalMeta}->{$journalGroup}->{$journalTitle};
// echo $articleTITLE;


// $xmlFILE = simplexml_load_file($uploadPATH.'/'.$articleXML);
// $xmlSTRING = simplexml_load_string($uploadPATH.'/'.$articleXML);



// var_dump( $xmlFILE );
// print_r( $xmlSTRING );







// $xml->front['journal-meta'];
// json_encode($xml->front);

// $postUPDATE = array(
// 	'ID' => $post->ID,
// 	'post_title' => $xmlTITLE
// );
// wp_update_post( $postUPDATE );

// foreach ($xml->front-> as $key1 => $value) {
//   $xmlARRAY[$key1] = $value['id'];
//   echo '<strong>'.$key1.' '.$value.':  '.$value['id'].'</strong><br>';
//
//   foreach ($value as $key2 => $value) {
//     $xmlARRAY[$key2] = $value['id'];
//     echo '<strong>'.$key2.' '.$value.': '.$value['id'].'</strong><br>';
//
//     foreach ($value as $key3 => $value) {
//       $xmlARRAY[$key3] = $value;
//     }
//   }
// }





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
	<link href="<?php echo get_template_directory_uri(); ?>/assets/css/desktop.css" rel="stylesheet">

	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/bootstrap.min.js"></script>

	<!-- MathJax Configuration -->
	<script type="text/x-mathjax-config">
		MathJax.Hub.Config({
			jax: ["input/TeX", "input/MathML","output/HTML-CSS"],
			SVG: { linebreaks: { automatic: true }, EqnChunk: 9999  },
			"displayAlign": "left",
			styles: {".MathJax_Display": {padding: "0em 0em 0em 3em" },".MathJax_SVG_Display": {padding: "0em 0em 0em 3em" }}
		});
	</script>
	<script type="text/javascript" src="http://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML"></script>

	<script src='<?php echo get_template_directory_uri(); ?>/assets/js/lens.js'></script>
	<script>
	var qs = function () {
		var query_string = {};
		var query = window.location.search.substring(1);
		var vars = query.split("&");
		for (var i=0;i<vars.length;i++) {
			var pair = vars[i].split("=");
				// If first entry with this name
			if (typeof query_string[pair[0]] === "undefined") {
				query_string[pair[0]] = pair[1];
				// If second entry with this name
			} else if (typeof query_string[pair[0]] === "string") {
				var arr = [ query_string[pair[0]], pair[1] ];
				query_string[pair[0]] = arr;
				// If third or later entry with this name
			} else {
				query_string[pair[0]].push(pair[1]);
			}
		}
		return query_string;
	} ();

	var documentURL = '<?php echo $xmlPATH; ?>';

	jQuery(function() {

		var app = new window.Lens({
			document_url: qs.url ? decodeURIComponent(qs.url) : documentURL
		});

		// app.start();

		window.app = app;

	});
	</script>

	<?php wp_head(); ?>
</head>

<body <?php body_class('site'); ?>>
  <h1><?php the_title(); ?></h1>

  <header class="site-header">
    <nav class="navbar">
      <div class="container">
        <div class="navbar-brand">
          <a class="navbar-item" href="<?php echo esc_url(home_url('/')); ?>" rel="home">
            <h1 class="title is-5"><?php echo get_bloginfo('name'); ?></h1>
          </a>
          <div class="navbar-burger burger" data-target="navbar">
            <span></span>
            <span></span>
            <span></span>
          </div>
        </div>
      </div>
    </nav>
  </header>

	<section class="site-page">
   	<div class="container">
     	<div class="page-wrap">
 				<div class="loading"></div>
     	</div>
   	</div>
 	</section>

<?php get_footer(); ?>
