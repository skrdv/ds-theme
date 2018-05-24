<?php global $numpost ; ?>

<div class="cardArticle">
	<div class="cardArticle-body">
		<div class="cardArticle-date"><?php the_date(); ?></div>
		<a class="cardArticle-title" data-toggle="modal" data-slide="<?php echo $numpost; ?>" data-target="#exampleModalCenter">
			<?php the_title(); ?>
		</a>
		<div class="cardArticle-persons">
			<?php the_field('article-authors'); ?>
		</div>
		<a class="cardArticle-counts">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/img/counts.png">
		</a>
	</div>
</div>

<?php $numpost++ ; ?>
