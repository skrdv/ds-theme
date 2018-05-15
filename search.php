<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>
<?php $t_names = 'Jannine K. Bailey, Jeremy L. Pinyon, Sashindran Anantham, Ruth M. Hall'; ?>

	<main role="main">

      <div class="start is-results">
        <a class="start-back" href="#"></a>
		  Search results
		  <div class="visible-xs">
        <form class="menu-search" role="search"  method="get" action="<?php echo home_url( '/' ); ?>">
          <input class="form-control" type="search" placeholder="Search the collection" value="<?php echo get_search_query() ?>" name="s">
        </form>
			  </div>
      </div>

	<div class="search-results">
		<div class="container">
	<?php if (have_posts()) : ?>
		<?php  while (have_posts()) : the_post(); ?>
		
			<div class="cardArticle">
				<div class="cardArticle-body">
					<div class="cardArticle-date"><?php the_date(); ?></div>
					<a class="cardArticle-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					<div class="cardArticle-persons"><?php if (get_field('article-authors')) { the_field('article-authors'); } else { echo $t_names; } ?></div>
					<div><?php the_excerpt(); ?></div>
				</div>
			</div>
	
		<?php endwhile; ?>
	<?php endif; ?>
			</div><!-- container --> 
	</div><!-- search results -->
		

		</main>
		
<?php get_footer();
