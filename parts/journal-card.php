<div class="cardJournal">
	<div class="cardJournal-body">
		<a class="cardJournal-title is-<?php the_field('journal-color') ?>">
			<?php the_title(); ?>
		</a>
    <div class="cardJournal-excerpt">
      <?php the_excerpt(); ?>
    </div>
		<div class="cardJournal-image">
      <?php the_post_thumbnail(array(540, 320)); ?>
    </div>
		<div class="cardJournal-link">
      <a class="btn btn-<?php the_field('journal-color') ?>" href="<?php the_permalink(); ?>">Go to journal</a>
    </div>
	</div>
</div>
