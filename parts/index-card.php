<?php $t_names = 'Jannine K. Bailey, Jeremy L. Pinyon, Sashindran Anantham, Ruth M. Hall'; ?>
<?php global $numpost ; ?>

<div class="cardArticle">
	<div class="cardArticle-body">
		<div class="cardArticle-date"><?php the_date(); ?></div>
		<a class="cardArticle-title" data-toggle="modal" data-slide="<?php echo $numpost; ?>" data-target="#exampleModalCenter">
			<?php the_title(); ?>
		</a>
		<div class="cardArticle-persons">
			<?php if (get_field('article-authors')) { the_field('article-authors'); } else { echo $t_names; } ?>
		</div>
		<a class="cardArticle-counts">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/img/counts.png">
		</a>
	</div>
</div>

<?php $numpost++ ; ?>
