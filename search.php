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

	<main role="main">

      <div class="start is-results">
        <a class="start-back" href="#"></a>
        <form class="menu-search" role="search"  method="get" action="<?php echo home_url( '/' ); ?>">
          <input class="form-control" type="search" placeholder="Search the collection" value="<?php echo get_search_query() ?>" name="s">
        </form>
      </div>

	<div class="search-results">
	<?php if (have_posts()) : ?>
		<?php  while (have_posts()) : the_post(); ?>
		
		<div class="card">
          <div class="card-body">
            <div class="card-date">NOVEMBER 2010</div>
            <a class="card-title" href="<?php the_permalink(); ?>"><?php the_title() ?></a>
            <div class="card-persons"><?php the_field( "article-authors" ); ?></div>
            <div class="card-excerpt">1.<?php the_excerpt(); ?></div>
            <div class="card-counts">
              <img src="/assets/img/counts.png">
            </div>
          </div>
        </div>
	
		<?php endwhile; ?>
	<?php endif; ?>
	</div>

<?php get_footer();
