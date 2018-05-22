<main role="main">

	<div class="start">
		<div class="container">		
			<?php while (have_posts()): the_post(); ?>
				<?php the_content(); ?>
			
				<?php 	$tempinfo = get_post_meta( $post->ID);	?>
				<?php print_r($tempinfo); ?>	
			<?php endwhile; ?>
		</div><!-- container -->
	</div><!-- start -->

</main>