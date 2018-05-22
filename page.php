get_header(); ?>


<main role="main" style="background:gray;">
		<div class="container">		
			<?php while (have_posts()): the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; ?>
		</div>
</main>

<?php get_footer(); ?>