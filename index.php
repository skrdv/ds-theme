<?php get_header(); ?>

<main role="main">

	<div class="start">
		<div class="container">
			<div class="start-inner">
				<h1 class="start-title">X-AMR Collection</h1>
				<p class="start-text">A collection of articles on cross-disciplinary antimicrobial resistance</p>
				<div class="visible-xs">
					<form class="menu-search" role="search"  method="get" action="<?php echo home_url( '/' ); ?>">
          	<input class="form-control" type="search" placeholder="Search the collection" value="<?php echo get_search_query() ?>" name="s">
        	</form>
				</div>
				<ul class="startTabs nav nav-tabs" id="myTab" role="tablist">
					<li class="startTabs-item">
						<a class="tab-link home-articles active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Most Recent Articles</a>
					</li>
					<li class="startTabs-item">
						<a class="tab-link home-journals" id="journals-tab" data-toggle="tab" href="#journals" role="tab" aria-controls="messages" aria-selected="false">The Journals</a>
					</li>
					<li class="startTabs-item">
						<a class="tab-link home-about" id="about-tab" data-toggle="tab" href="#about" role="tab" aria-controls="profile" aria-selected="false">About the Collection</a>
					</li>
				</ul>
			</div><!-- start-inner -->
		</div><!-- container -->
	</div><!-- start -->

	<div class="tab-content">
    <div class="tab-pane home-articles active" id="home" role="tabpanel" aria-labelledby="home-tab">
			<div class="container">
				<h2 class="pane-title">Most recent articles on cross-disciplinary antimicrobial resistance research:</h2>
				<div class="articles">
					<?php global $numpost ; ?>
					<?php if (have_posts()): ?>
						<?php while (have_posts()): the_post(); ?>
							<?php get_template_part('parts/index','card'); ?>
						<?php endwhile; ?>
					<?php endif; ?>
				</div><!-- articles -->
      </div><!-- container -->
    </div><!-- tab-pane -->

		<div class="tab-pane home-about" id="about" role="tabpanel" aria-labelledby="profile-tab">
			<div class="container">
				<h2 class="pane-title">Publish your cross-disciplinary antimicrobial resistance research in X-AMR, a pop-up journal.</h2>
				<div class="aboutTab-content">
					<?php $query = new WP_Query('page_id=709'); ?>
					<?php while ( $query->have_posts() ): $query->the_post(); ?>
						<?php  the_content(); ?>
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
				</div><!-- about -->
			</div><!-- container -->
		</div><!-- tab-pane -->

    <div class="tab-pane home-journals" id="journals" role="tabpanel" aria-labelledby="messages-tab">
			<div class="container">
				<h2 class="pane-title">This collection on cross-disciplinary antimicrobial resistance showcases a selection of articles from four of the Microbiology Society’s six journals:</h2>
				<div class="journals-list">
					<?php $journals = new WP_Query(array('post_type' => 'journal', 'order' => 'ASC',)); ?>
					<?php while ( $journals->have_posts() ): $journals->the_post(); ?>
						<div class="item">
							<?php get_template_part('parts/journal','card'); ?>
						</div>
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
				</div>
      </div><!-- container -->
    </div><!-- tab-pane -->

	</div>

    </main>

<script>
// wire up shown event
jQuery('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
    console.log("tab shown...");
});

// read hash from page load and change tab
var hash = document.location.hash;
var prefix = "tab_";
if (hash) {
    jQuery('.nav-tabs a[href="'+hash.replace(prefix,"")+'"]').tab('show');
}

jQuery(function () {
  jQuery('a.link-to-tab').click(function (e) {
    e.preventDefault();
    jQuery('a[href="' + jQuery(this).attr('href') + '"]').tab('show');
  })
});

</script>


<?php get_footer(); ?>
