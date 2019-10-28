<?php if ( ! get_theme_mod( 'archive_hide_excerpt', false ) ) : ?>
	<div class="entry__summary margin-y-sm">
		<?php the_excerpt() ?>
	</div>
<?php endif ?>
