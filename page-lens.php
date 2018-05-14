<?php
/**
 * Template Name: Lens
 */
?>

<?php
// $the_query = new WP_Query( $args );

if (isset($wp_query->query_vars['article'])):
	$referlink = $wp_query->query_vars['article'];
	$xml = get_field('article-xml', $referlink);
else:
	$xml = 'jmm000585.xml';
endif;

$xml_path = '//ds.skrdv.com/wp-content/uploads/'.$xml;

// print_r($referlink	query);

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

		var documentURL = '<?php echo $xml_path; ?>';

		// console.log(documentURL);

		jQuery(function() {

			var app = new window.Lens({
				document_url: qs.url ? decodeURIComponent(qs.url) : documentURL
			});

			app.start();

			window.app = app;

		});

		// jQuery(function() {
		//
		// 	setTimeout(function(){
		// 		var src = jQuery('img').attr('scr');
		// 		jQuery('img').attr('src', '/'+src);
		// 		console.log('start');
		// 		console.log(src);
		// 	}, 3000);
		//
		// });

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
