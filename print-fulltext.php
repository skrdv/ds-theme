<?php
/**
 * Template Name: Print Full Text
 */
?>

<?php
if (isset($wp_query->query_vars['article'])) {
	$postID = $wp_query->query_vars['article'];
	$postPermalink = get_permalink($postID);
	$articleTitle = get_the_title($postID);
	$articleBody = get_field('article-body', $postID);
}
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Print Full Text <?php echo $articleTitle; ?></title>
	<?php wp_head(); ?>
	<script type="text/javascript">
		// window.print();
	</script>
</head>
<body>

	<div class="print">
    <h1 class="title"><?php echo $articleTitle; ?></h1>
    <h3 class="subtitle">Full Text</h3>
    <div class="content">
      <?php echo $articleBody; ?>
    </div>
		<div class="link">
			<?php echo $postPermalink; ?>
		</div>
  </div>

<?php wp_footer(); ?>
</body>
</html>
