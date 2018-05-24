<?php 
if (isset($wp_query->query_vars['template'])) {
	$template = $wp_query->query_vars['template'];
}
?>

<?php if ($template != 'lens'): ?>
<?php get_header(); ?>
	


<?php while (have_posts()): the_post(); ?>

  <main role="main">

    <div class="intro hidden" data-toggle="sticky-onscroll">
      <div class="intro-meta"><?php the_field('article-date'); ?></div>
      <h1 class="intro-title"><?php the_title(); ?></h1>
      <div class="intro-authors"><?php the_field('article-authors'); ?></div>
      <div class="intro-pdf">
        <a class="btn btn-primary" href="<?php echo wp_upload_dir()['baseurl'].'/'.get_field('article-pdf'); ?>" target="_blank">PDF 753kB</a>
        <?php // <a class="intro-tweet" href="#">Tweet</a> ?>
      </div>
    </div>

    <div class="article-content hidden"></div>

    <div class="lens">
      <iframe src="<?php the_permalink(); ?>/?article=<?php echo get_the_ID(); ?>&template=lens" width="900" height="1400"></iframe>
    </div>

  </main>

<?php endwhile; ?>

<div class="more-like">
	<h3>More like this ...</h3>
	<?php
	$last_posts = new WP_Query;
	$moreLikeThis = $last_posts->query( array(
		'post_type' => 'post',
		'posts_per_page' => '4'
	) );
	?>
	<div class="container test">
		<?php foreach( $moreLikeThis as $post ){ ?>
      <div class="item">
        <div class="cardArticle">
  				<div class="cardArticle-body">
  					<div class="cardArticle-date">
              <?php the_field('article-date', $post->ID); ?>
            </div>
  					<a class="cardArticle-title" data-toggle="modal" data-slide="" data-target="#exampleModalCenter">
  						<?php echo esc_html( $post->post_title ); ?>
  					</a>
  					<div class="cardArticle-persons">
  						<?php the_field('article-authors', $post->ID); ?>
            </div>
  					<a class="cardArticle-counts">
  						<img src="http://ds.skrdv.com/wp-content/themes/ds-theme/assets/img/counts.png">
  					</a>
  				</div>
  			</div>
      </div>
		<?php } ?>
	</div>
</div>
<?php else: ?>
<?php get_template_part('lens'); ?>	
<?php endif; ?>
<?php get_footer(); ?>
