<?php
/**
 * The template for displaying search results pages
 */
?>
<?php get_header(); ?>

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
			<?php global $numpost ; ?>
			<?php if (have_posts()) : ?>
				<?php  while (have_posts()) : the_post(); ?>
					<?php get_template_part('parts/index','card'); ?>
				<?php endwhile; ?>
			<?php else: ?>
				<h1>Sorry, nothing was found, please try again</h1>
			<?php endif; ?>
		</div><!-- container -->
	</div><!-- search results -->
</main>

<?php get_footer();
