<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<?php wp_head(); ?>
  </head>

  <body>

<div class="site-wrapper">
  
<header class="siteHeader">
  
  <div class="collapse" id="navbarHeader">
		<a class="menu-logo" href="/">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-header.png" alt="Microbiology Society">
		</a>
	     
		<button class="menu-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/img/arrow-white.png">
		</button>

    <ul class="menu-nav menu-collection">
      <li><a href="#">X-AMR Collection</a>
        <ul>
          <li><a href="#">Latest Articles</a></li>
          <li><a href="#">About the Collection</a></li>
          <li><a href="#">Journals</a></li>
        </ul>
      </li>
    </ul>
    <div class="menu-line"></div>
    <ul class="menu-nav menu-about">
      <li><a class="is-muted" href="#">About Us</a>
        <ul>
          <li><a href="#">About the Society</a></li>
          <li><a href="#">Terms and Conditions</a></li>
          <li><a href="#">Privacy Policy</a></li>
          <li><a href="#">Contact us</a></li>
          <li><a href="#">Submit a Publishing Proposal</a></li>
        </ul>
      </li>
    </ul>
	</div>
  
  
  <div class="navbar">
    <a href="/" class="navbar-brand">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-header.png" alt="Microbiology Society">
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
</header>
