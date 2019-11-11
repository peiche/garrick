<?php $image_aspect_ratio = get_theme_mod( 'archive_image_aspect_ratio', '' ); ?>
<?php if ( has_post_thumbnail() ) : ?>
	<?php Hybrid\Carbon\Image::display( 'featured', [
		'size' => 'full',
		'class' => 'entry__image rounded',
		'before' => '<figure class="' . $image_aspect_ratio . ' margin-y-sm">',
		'after' => '</figure>',
		'link' => true,
		'link_class' => 'entry__featured-image__link',
	] ) ?>
<?php elseif ( get_theme_mod( 'archive_image_placeholder', false ) && '' != get_theme_mod( 'archive_image_aspect_ratio', '' ) ) : ?>
	<a href="<?php echo esc_url( get_permalink() ) ?>" class="entry__featured-image__link color-contrast-low" aria-hidden="true">
		<div class="<?php echo esc_attr( $image_aspect_ratio ) ?> margin-y-sm bg-contrast-lower rounded">
			<div class="media-wrapper--icon flex items-center justify-center">
				<?php $post_format = get_post_format() ?: 'standard'; ?>
				<?php echo \Garrick\get_svg( [ 'icon' => 'format-' . $post_format, 'class' => 'icon--md color-inherit' ] ) ?>
			</div>
		</div>
	</a>
<?php endif ?>
