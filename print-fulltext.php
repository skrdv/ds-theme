<?php
/**
 * Template Name: Print Full Text
 */
?>

<?php

if (isset($wp_query->query_vars['article'])) {
	$postID = $wp_query->query_vars['article'];
} else {
  $postID = '987';
}

$articleBody = get_field('article-body', $postID);

?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Print Full Text <?php echo $postID; ?></title>
  <link href="<?php echo get_template_directory_uri(); ?>/assets/css/styles.css" rel="stylesheet">
  <link href="<?php echo get_template_directory_uri(); ?>/assets/css/print.css" rel="stylesheet">
</head>
<body>

  <div class="print">
    <h1 class="title">Full Text</h1>
    <div class="content">
      <?php echo $articleBody; ?>
    </div>
  </div>

<?php wp_footer(); ?>
</body>
</html>
