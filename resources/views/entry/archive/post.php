<article <?php Hybrid\Attr\display( 'entry ' . $data->class ) ?>>

	<?php Hybrid\View\display( 'partials', 'archive-image' ) ?>

	<?php $format = get_post_format() ?>
	<?php if ( is_sticky() ) : ?>
		<span class="btn btn--subtle btn--sm">
			<?php echo \Garrick\get_svg( [ 'icon' => 'pin', 'class' => 'color-contrast-high margin-right-xxxs' ] ) ?>
			<?php echo esc_html_e( 'Pinned', 'garrick' ) ?>
		</span>
	<?php elseif ( '' != $format ) : ?>
		<a href="<?php echo esc_url( get_post_format_link( $format ) ) ?>" class="btn btn--subtle btn--sm">
			<?php echo \Garrick\get_svg( [ 'icon' => 'format-' . $format, 'class' => 'color-contrast-high margin-right-xxxs' ] ) ?>
			<?php echo esc_html( ucwords( $format ) ) ?>
		</a>
	<?php endif ?>

	<header class="entry__header">
		<?php Hybrid\Post\display_title( [ 'class' => 'entry__title margin-top-auto text-lg' ] ) ?>
	</header>

	<?php Hybrid\View\display( 'partials', 'archive-excerpt' ) ?>

	<div class="entry__footer">
		<div class="entry__byline">

			<?php if ( ! is_author() ) : ?>
				<?php Hybrid\View\display( 'partials', 'avatar', [ 'author' => get_post()->post_author, 'size' => 30 ] ) ?>
				<?php Hybrid\Post\display_author( [ 'after' => \Garrick\sep() ] ) ?>
			<?php endif ?>

			<a href="<?php echo esc_url( get_permalink() ) ?>" class="entry__permalink"><?php Hybrid\Post\display_date() ?></a>
		</div>

		<?php if ( get_theme_mod( 'archive_show_tags', false ) && has_tag() ) : ?>
			<div class="margin-top-xs">
				<?php Hybrid\View\display( 'partials', 'post-terms', [ 'taxonomy' => 'post_tag' ] ) ?>
			</div>
		<?php endif ?>
	</div>
</article>
