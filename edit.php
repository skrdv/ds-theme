<?php
/**
 * Template Name: Edit
 */
?>

<?php

// Get User data
$userID = get_current_user_id();
$userData = get_userdata($userID);
$userEmail = $userData->data->user_email;
// echo $userEmail;

// Get Post data
$postID = '333';
// $postID = $post->ID;
$post = get_post($postID);
$articleTitle = $post->post_title;

// Get fields
$articleZip      = get_field('article-zip', $postID);
$articleXml	     = get_field('article-xml', $postID);
$articlePdf	     = get_field('article-pdf', $postID);
$articleDate     = get_field('article-date', $postID);
$articleAuthors  = get_field('article-authors', $postID);
$articleArstract = get_field('article-abstract', $postID);
$articleBody     = get_field('article-body', $postID);

// Get other data
$articleFile = $articleZip['filename'];

// Test XML
$articleName = str_replace('.', '', substr($articleFile, 0, -4));
$articleXml = $articleName.'.xml';

// $args = new WP_Query(array(
//   'post_type'=>'post',
//   'post_status'=>'publish',
//   'posts_per_page'=>1)
// );
// print_r($args);

?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Post <?php echo $postID; ?></title>
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
    <div class="bread hidden">
      <div class="item">Home</div>
      <div class="item">Journal of Medical Microbiology</div>
      <div class="item">Volume 59, Issue 11</div>
      <div class="item active">Article</div>
    </div>
  </header>

<div class="container">
  <form style="">
    <fieldset>
      <legend>Edit post ID</legend>
      <div class="form-group row">
        <label for="debug" class="col-sm-2 col-form-label">Debug</label>
        <div class="col-sm-10">
          <input type="email" readonly="" class="form-control" id="debug" value="<?php echo $articleFile; ?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="userEmail" class="col-sm-2 col-form-label">User</label>
        <div class="col-sm-10">
          <input type="email" readonly="" class="form-control" id="userEmail" value="<?php echo $userEmail; ?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="postId" class="col-sm-2 col-form-label">Post ID</label>
        <div class="col-sm-10">
          <input type="text" readonly="" class="form-control" id="postId" value="<?php echo $postID; ?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="articleTitle" class="col-sm-2 col-form-label">Title</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="articleTitle" value="<?php echo $articleTitle; ?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="articleZip" class="col-sm-2 col-form-label">Archive</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="articleZip" value="<?php echo $articleFile; ?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="articleXml" class="col-sm-2 col-form-label">XML file</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="articleXml" value="<?php echo $articleXml; ?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="articlePdf" class="col-sm-2 col-form-label">PDF file</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="articlePdf" value="<?php echo $articlePdf; ?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="articleDate" class="col-sm-2 col-form-label">Date</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="articleDate" value="<?php echo $articleDate; ?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="articleAuthors" class="col-sm-2 col-form-label">Authors</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="articleAuthors" value="<?php echo $articleAuthors; ?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="articleZip" class="col-sm-2 col-form-label">Abstract</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="articleZip" value="<?php echo $articleArstract; ?>">
        </div>
      </div>
      <div class="form-group">
        <label for="zipFile">File input</label>
        <input type="file" class="form-control-file" id="zipFile">
      </div>
      <button type="submit" class="btn btn-primary">Just submit</button>
    </fieldset>
  </form>
</div>

<br><br>
<?php

$args = array(
  'ID' => $postID,
  'post_title' => $articleTitle
);

// $postUpdate = array( 'ID' => $post_id, 'post_title' => $articleTitle );
// wp_update_post( $postUpdate );

?>

<?php get_footer(); ?>
