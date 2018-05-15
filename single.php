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
  <link href="<?php echo get_template_directory_uri(); ?>/assets/css/desktop.css" rel="stylesheet">

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
      <div class="item">Home</div>
      <div class="item">Journal of Medical Microbiology</div>
      <div class="item">Volume 59, Issue 11</div>
      <div class="item active">Article</div>
    </div>
  </header>

<?php while (have_posts()): the_post(); ?>

  <main role="main">

    <div class="intro">
      <div class="container">
        <div class="intro-meta">November 2010, Journal of Medical Microbiology</div>
        <h1 class="intro-title"><?php the_title(); ?></h1>
        <div class="intro-persons"><?php the_field('article-authors'); ?></div>
        <div class="intro-pdf">
          <a class="btn btn-primary" href="<?php echo wp_upload_dir()['baseurl'].'/'.get_field('article-pdf'); ?>" target="_blank">PDF 753kB</a>
          <a class="intro-tweet" href="#">Tweet</a>
        </div>
      </div>
    </div>

    <div class="lens">
      <iframe src="//ds.skrdv.com/lens/?article=<?php echo get_the_ID(); ?>" width="900" height="1400"></iframe>
    </div>

  </main>

<?php endwhile; ?>

<?php get_footer(); ?>
