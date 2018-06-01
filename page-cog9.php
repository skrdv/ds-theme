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
<div class="adminHeader">
	<!--<div class="adminHeader-topbar"><a href="/cog9-admin"><img class="adminHeader-leftlogo" src="<?php echo get_template_directory_uri(); ?>/assets/img/cog9-left.png"></a><a href="/cog9-admin"><img class="adminHeader-rightlogo" src="<?php echo get_template_directory_uri(); ?>/assets/img/cog9-right.png"></a></div>-->
	<div class="adminHeader-bottombar" style="margin-left: 0px !important; width: 100px;"><a href="/cog9-admin">Digital Science</a></div>
</div>
<div class="adminContent">	
	<?php the_content(); ?>	
</div>	
	  
<?php endwhile; ?>
<?php wp_footer(); ?> 
</body>
</html>