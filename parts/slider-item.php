<div>
<div class="cardArticle-modal">
	<div class="cardArticle-date"><?php the_field('article-dtes'); ?></div>
	<a class="cardArticle-title" href="<?php the_permalink(); ?>">
		<?php the_title(); ?>
	</a>
	<div class="cardArticle-persons">
		<?php the_field('article-authors'); ?>
	</div>
	<div class="cardAbstract">
		<div class="nano">
    		<div class="nano-content"><?php the_field('article-abstract'); ?></div>
		</div>
	</div>
	<div class="cardArticle-buttons">
		<button type="button" class="btn btn-transparent" data-dismiss="modal">Close</button>
		<a class="btn btn-primary" href="<?php the_permalink(); ?>">Open</a>
	</div>
</div>
</div>