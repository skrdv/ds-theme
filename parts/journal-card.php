<div class="cardJournal hidden-xs">
	<div class="cardJournal-body">
		<h3 class="cardJournal-title is-<?php the_field('journal-color') ?>">
			<?php the_title(); ?>
		</h3>
    <div class="cardJournal-excerpt">
      <?php the_excerpt(); ?>
    </div>
		<?php if(has_post_thumbnail()): ?>
		<div class="cardJournal-image">
      <?php the_post_thumbnail(array(540, 320)); ?>
    </div>
		<div class="cardJournal-link">
      <a class="btn btn-<?php the_field('journal-color') ?>" href="<?php the_permalink(); ?>">Go to journal</a>
    </div>
		<?php endif; ?>
	</div>
</div>
<a class="cardJournal visible-xs" href="<?php the_permalink(); ?>">
	<div class="cardJournal-body">
		<h3 class="cardJournal-title is-<?php the_field('journal-color') ?>">
			<?php the_title(); ?>
		</h3>
    <div class="cardJournal-excerpt">
      <?php the_excerpt(); ?>
    </div>
		<?php if(has_post_thumbnail()): ?>
		<div class="cardJournal-image">
      <?php the_post_thumbnail(array(540, 320)); ?>
    </div>
		<?php endif; ?>
	</div>
</a>
