<?php if ( ! get_theme_mod( 'archive_hide_excerpt', false ) ) : ?>
	<div class="entry__summary margin-y-sm">
		<?php the_excerpt() ?>

		<?php if ( ! get_theme_mod( 'archive_hide_readmore', false ) ) : ?>
			<a href="<?php echo esc_url( get_permalink() ) ?>" class="btn btn--primary">
				<?php echo esc_html__( 'Read More', 'garrick' ) ?>
				<?php echo \Garrick\get_svg( [ 'icon' => 'arrow-right', 'class' => 'margin-left-xxs' ] ) ?>
			</a>
		<?php endif ?>
	</div>
<?php endif ?>
