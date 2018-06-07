<?php //Template Name: Cog 9 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Digital Science - Admin Dashboard</title>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php while (have_posts()): the_post(); ?>
<div id="admin-head" class="adminHeader">
	<div class="adminHeader-bottombar">
		<a href="/cog9-admin" style="float: none;">Digital Science</a>
		<?php do_action( 'posts_logout_link', 'Log out' ); ?>
	</div>
</div>
<div id="admin-content" class="adminContent">
	<?php the_content(); ?>
</div>

<?php endwhile; ?>
<?php wp_footer(); ?>
</body>
</html>
