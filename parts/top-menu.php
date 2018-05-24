  <div class="collapse" id="navbarHeader">
		<a class="menu-logo" href="/">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-header.png" alt="Microbiology Society">
		</a>
	     
		<button class="menu-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/img/arrow-white.png">
		</button>

    <ul class="menu-nav menu-collection">
      <li><span class="menu-static-item">X-AMR Collection</span>
        <ul>
			<?php if (is_home()): ?>
          		<li><a onClick="jQuery('#journals-tab').removeClass('active'); jQuery('#journals').removeClass('active'); jQuery('#home-tab').addClass('active'); jQuery('#home').addClass('active'); jQuery('#about-tab').removeClass('active'); jQuery('#about').removeClass('active'); " href="#" >Latest Articles</a></li>
          		<li><a onClick="jQuery('#journals-tab').addClass('active'); jQuery('#journals').addClass('active'); jQuery('#home-tab').removeClass('active'); jQuery('#home').removeClass('active'); jQuery('#about-tab').removeClass('active'); jQuery('#about').removeClass('active'); " href="#">Journals</a></li>
				<li><a onClick="jQuery('#journals-tab').removeClass('active'); jQuery('#journals').removeClass('active'); jQuery('#home-tab').removeClass('active'); jQuery('#home').removeClass('active'); jQuery('#about-tab').addClass('active'); jQuery('#about').addClass('active'); " href="#">About the Collection</a></li>
			<?php else: ?>
				<li><a href="<?php home_url(); ?>/#tab_home" >Latest Articles</a></li>
			    <li><a href="<?php home_url(); ?>/#tab_journals" >Journals</a></li>		
          		<li><a href="<?php home_url(); ?>/#tab_about" >About the Collection</a></li>
			<?php endif; ?>
        </ul>
      </li>
    </ul>
    <div class="menu-line"></div>
    <ul class="menu-nav menu-about">
      <li><span class="menu-static-item">About Us</span>
        <ul>
          <li><a href="#">About the Society</a></li>
          <li><a href="#">Terms and Conditions</a></li>
          <li><a href="#">Privacy Policy</a></li>
          <li><a href="#">Contact us</a></li>
        </ul>
      </li>
    </ul>
	</div>