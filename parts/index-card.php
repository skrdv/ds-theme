<?php global $numpost ; ?>

<div class="cardArticle">
	<div class="cardArticle-body">
		<div class="cardArticle-date"><?php the_field('article-date'); ?></div>
		<a class="cardArticle-title" data-toggle="modal" data-slide="<?php echo $numpost; ?>" data-target="#exampleModalCenter">
			<?php the_title(); ?>
		</a>
		<div class="cardArticle-persons">
			<?php the_field('article-authors'); ?>
		</div>
		<?php if (! is_home()): ?>
		<div class="cardArticle-excerpt"><?php the_excerpt(); ?></div>
		<?php endif; ?>
		<div class="cardArticle-counters">
			<?php $doi = '10.1001/jama.2016.9797'; ?>
			<?php if ( get_field('article-doi') ) { $doi = get_field('article-doi'); } ?>
				<span class="__dimensions_badge_embed__" data-doi="<?php echo $doi; ?>" data-style="small_rectangle"></span>
		     	<div data-badge-type="1" data-doi="<?php echo $doi; ?>" class="altmetric-embed"></div>
		</div>
	</div>
</div>

<?php $numpost++ ; ?>
