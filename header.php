<?php
/**
 * Site Header Template
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div class="site-wrapper">

<header class="siteHeader">
	<?php get_template_part('parts/top','menu'); ?>

  <div class="navbar">
    <a href="/" class="navbar-brand">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/Microbiology-Logo.png" alt="Microbiology Society">
    </a>
	  <div class="hidden-xs">
			<form class="menu-search2" role="search"  method="get" action="<?php echo home_url( '/' ); ?>">
        <input class="form-control" type="search" placeholder="Search the collection" value="<?php echo get_search_query() ?>" name="s">
      </form>
		</div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
      <span></span>
      <span></span>
      <span></span>
    </button>
  </div>
<?php if (is_single()): ?>
<div class="bread">
   <div class="item"><a href="/">Home</a></div>
</div>
<?php endif; ?>
</header>
