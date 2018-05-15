<footer class="footer">
<div class="container">
  <div class="footer-title">About Us</div>
  <ul class="footer-menu">
    <li class="footer-item">
      <a class="footer-link" href="#">About the Society</a>
    </li>
    <li class="footer-item">
      <a class="footer-link" href="#">Terms and Conditions</a>
    </li>
    <li class="footer-item">
      <a class="footer-link" href="#">Privacy Policy</a>
    </li>
    <li class="footer-item">
      <a class="footer-link" href="#">Contact us</a>
    </li>
    <li class="footer-item">
      <a class="footer-link" href="#">Submit a Publishing Proposal</a>
    </li>
  </ul>
  <a class="footer-logo" href="/">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-footer.png" alt="Microbiology Society">
  </a>
</div>
</footer>
  
</div><!-- site-wrapper -->


<script>
 jQuery('a[data-slide]').click(function(e) {
   var slideno = jQuery(this).data('slide');
   jQuery('.slickSlider').slick('slickGoTo', slideno);
 });	
</script>	

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
		<div class="slickSlider">
			<?php $args = array('posts_per_page' => 10); ?>
			<?php $query = new WP_Query( $args ); ?>
			<?php if ( $query->have_posts() ): ?>
				<?php while ( $query->have_posts() ): $query->the_post();?>
				<?php  get_template_part('parts/slider','item'); ?>
				<?php endwhile; ?>
			<?php endif; ?>
			<?php wp_reset_postdata(); ?>
		</div>		
    </div>
  </div>
</div>


<?php wp_footer(); ?>

</body>
</html>