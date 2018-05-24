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
	<div class="searchHeader">
    	<a class="searchHeader-back" href="/"></a>
		<div class="container-fluid">
			<div class="row">
			<div class="col-md-3 col-sm-6"><h3 class="searchHeader-title">Searching the collection:</h3></div>
			<div class="col-md-6 col-sm-6">
        <form class="searchHeader-form" role="search"  method="get" action="<?php echo home_url( '/' ); ?>">
          <input class="searchHeader-form-input" type="search" placeholder="Search the collection" value="<?php echo get_search_query() ?>" name="s">
        </form>
				</div>
			</div>
		</div>	
      </div>

		
	<div class="search-results">
		<div class="container">
			<h2 class="pane-title">Search Results:</h2>
	<?php $numpost = 1; ?>
	<?php if (have_posts()) : ?>
		<?php  while (have_posts()) : the_post(); ?>
		
			<div class="cardArticle">
				<div class="cardArticle-body">
					<div class="cardArticle-date"><?php the_date(); ?></div>
					<a class="cardArticle-title" data-toggle="modal" data-slide="<?php echo $numpost; ?>" data-target="#exampleModalCenter"><?php the_title(); ?></a>
					<div class="cardArticle-persons"><?php the_field('article-authors'); ?></div>
					<div><?php the_excerpt(); ?></div>
					  <a class="cardArticle-counts">
  						<img src="http://ds.skrdv.com/wp-content/themes/ds-theme/assets/img/counts.png">
  					</a>
				</div>
			</div>
	
			<?php $numpost++ ; ?>
		<?php endwhile; ?>
	<?php else: ?>
		<h1>Sorry, nothing was found, please try again</h1>	
	<?php endif; ?>
	<?php //wp_reset_postdata(); ?>

			</div><!-- container --> 
	</div><!-- search results -->
</main>

<?php /*
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
		<?php if (have_posts()) : ?>
		<?php  while (have_posts()) : the_post(); ?>
				<?php  get_template_part('parts/slider','item'); ?>
		<?php endwhile; ?>
	<?php endif; ?>		
		</div>		
    </div>
  </div>
</div>
*/ ?>			
			

		


<?php get_footer();
