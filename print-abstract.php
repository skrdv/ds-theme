<?php
/**
 * Template Name: Print Abstract
 */
?>

<?php

if (isset($wp_query->query_vars['article'])) {
	$postID = $wp_query->query_vars['article'];
} else {
  $postID = '987';
}

$articleArstract = get_field('article-abstract', $postID);

?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Print Abstract <?php echo $postID; ?></title>
  <link href="<?php echo get_template_directory_uri(); ?>/assets/css/styles.css" rel="stylesheet">
  <link href="<?php echo get_template_directory_uri(); ?>/assets/css/print.css" rel="stylesheet">
</head>
<body>

  <div class="print">
    <h1 class="title">Abstract</h1>
    <div class="content">
      <?php echo $articleArstract; ?>
    </div>
  </div>

<?php wp_footer(); ?>
</body>
</html>
