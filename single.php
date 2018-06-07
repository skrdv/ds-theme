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
        <a class="btn btn-primary" id="pdfbtn" href="<?php echo wp_upload_dir()['baseurl'].'/'.get_field('article-pdf'); ?>" target="_blank">PDF 753kB</a>
        <a class="intro-tweet" href="#">Tweet</a>
      </div>
    </div>

    <div class="article-content hidden"></div>

    <div class="lens" id="lens">
      <iframe src="<?php the_permalink(); ?>/?article=<?php echo get_the_ID(); ?>&template=lens" height="1400"></iframe>
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
	<div class="container">
		<?php foreach( $moreLikeThis as $post ){ ?>
      <div class="item">
        <?php get_template_part('parts/index','card'); ?>
      </div>
		<?php } ?>
	</div>

</div>



<?php else: ?>
<?php get_template_part('lens'); ?>
<?php endif; ?>

<?php get_footer(); ?>
