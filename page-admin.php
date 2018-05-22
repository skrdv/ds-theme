<?php //Template Name: Admin Page
get_header(); ?>


<main role="main" style="background:gray;">

	<div class="start">
		<div class="container">		
			<?php while (have_posts()): the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; ?>
		</div>
	</div>


</main>

<?php get_footer(); ?>