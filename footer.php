<footer class="siteFooter">
	<div class="siteFooter-logo">
		<a href="/">
    		<img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-footer.png" alt="Microbiology Society">
		</a>
	</div>		
	
	<div class="container">
		<div class="siteFooter-title">About Us</div>
    	<ul class="siteFooter-menu">
    		<li class="siteFooter-menu-item"><a class="siteFooter-menu-link" href="https://microbiologysociety.org/about.html">About the Society</a></li>
    		<li class="siteFooter-menu-item"><a class="siteFooter-menu-link" href="http://www.microbiologyresearch.org/about/terms-and-conditions/">Terms and Conditions</a></li>
    		<li class="siteFooter-menu-item"><a class="siteFooter-menu-link" href="https://microbiologysociety.org/about-this-site/privacy-policy.html">Privacy Policy</a></li>
    		<li class="siteFooter-menu-item"><a class="siteFooter-menu-link" href="http://www.microbiologyresearch.org/about/contact-us/">Contact us</a></li>
  		</ul>
	</div><!-- container -->
</footer>
  
</div><!-- site-wrapper -->





<script>
 jQuery('a[data-slide]').click(function(e) {
   var slideno = jQuery(this).data('slide');
   jQuery('.slickSlider').slick('slickGoTo', slideno);
 });	
</script>	


<?php wp_reset_postdata(); ?>

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
		<div class="slickSlider">
			<?php if (! is_single()): ?>
				<?php if ( have_posts() ): ?>
					<?php while (have_posts() ): the_post();?>
					<?php  get_template_part('parts/slider','item'); ?>
					<?php endwhile; ?>
				<?php endif; ?>
				<?php wp_reset_postdata(); ?>
			<?php else: ?>
				<?php $args = array('posts_per_page' => 4); ?>
					<?php $query = new WP_Query( $args ); ?>
					<?php if ( $query->have_posts() ): ?>
					<?php while ( $query->have_posts() ): $query->the_post();?>
						<?php  get_template_part('parts/slider','item'); ?>
					<?php endwhile; ?>
					<?php endif; ?>
					<?php wp_reset_postdata(); ?>
			<?php endif; ?>
		</div>		
    </div>
  </div>
</div>


<?php wp_footer(); ?>

<script>
	jQuery(".nano").nanoScroller();
</script>

</body>
</html>