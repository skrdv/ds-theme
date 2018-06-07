<?php //Template Name:  Article Approve ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Digital Science - Admin Dashboard</title>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div id="admin-head" class="adminHeader">
	<div class="adminHeader-bottombar" ><a href="/cog9-admin">Digital Science</a></div>
</div>	
	
	<div id="admin-content" class="adminContent">
			<?php while (have_posts()): the_post(); ?>
				<h1><?php the_title(); ?></h1>	
					<?php do_action('admin_notices'); ?>
					<?php $notices = get_option( "my_flash_notices", array() ); ?>
					<?php delete_option( "my_flash_notices", array() ); ?>
					
					<?php if ($notices): ?>
						<?php the_content(); ?>
					<?php else: ?>
						<h3>Please add new Article to see its status</h3>
					<?php endif; ?>
			<?php endwhile; ?>

	</div>
	
<?php wp_footer(); ?>
</body>
</html>
