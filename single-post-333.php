<?php 
if (isset($wp_query->query_vars['template'])) {
	$template = $wp_query->query_vars['template'];
}
?>

<?php if ($template != 'lens'): ?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php the_title(); ?></title>

  <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,400italic,600italic' rel="stylesheet">
  <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

  <link href="<?php echo get_template_directory_uri(); ?>/assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo get_template_directory_uri(); ?>/assets/css/lens.css" rel="stylesheet">
  <link href="<?php echo get_template_directory_uri(); ?>/assets/css/styles.css" rel="stylesheet">
  <link href="<?php echo get_template_directory_uri(); ?>/assets/css/debug.css" rel="stylesheet">

  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/bootstrap.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/scripts.js"></script>

</head>
<body>

  <header>
    <div class="navbar">
      <a href="/" class="navbar-brand">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-header.png" alt="Microbiology Society">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
    </div>
    <div class="bread">
      <div class="item"><?php echo $template ?></div>
      <div class="item">Journal of Medical Microbiology</div>
      <div class="item">Volume 59, Issue 11</div>
      <div class="item active">Article</div>
    </div>
  </header>

<?php while (have_posts()): the_post(); ?>

  <main role="main">

    <div class="intro hidden" data-toggle="sticky-onscroll">
      <div class="intro-meta"><?php the_field('article-date'); ?></div>
      <h1 class="intro-title"><?php the_title(); ?></h1>
      <div class="intro-authors"><?php the_field('article-authors'); ?></div>
      <div class="intro-pdf">
        <a class="btn btn-primary" href="<?php echo wp_upload_dir()['baseurl'].'/'.get_field('article-pdf'); ?>" target="_blank">PDF 753kB</a>
        <!-- <a class="intro-tweet" href="#">Tweet</a> -->
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
<?php get_template_part('lens2'); ?>	
<?php endif; ?>
<?php get_footer(); ?>
