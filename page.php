<?php get_header(); ?>

<main role="main" style="background:#fff; min-height: 50vh; border-top: 20px solid #e6e6e6;">
		<div class="container">		
			<?php while (have_posts()): the_post(); ?>
				<h1><?php the_title(); ?></h1>	
				<?php the_content(); ?>
			<?php endwhile; ?>
		</div>
</main>

<?php get_footer(); ?>