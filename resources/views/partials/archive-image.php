<?php
	$image_aspect_ratio = get_theme_mod( 'featured_image_aspect_ratio', '' );
	$post_format = get_post_format() ?: 'standard';
	$image_icon = '';
	if ( '' != $image_aspect_ratio ) :
		$image_aspect_ratio = $image_aspect_ratio . ' bg-contrast-lower radius-md';
		$image_icon = '<div class="media-wrapper--icon flex items-center justify-center">' .
				\Garrick\get_svg( [ 'icon' => 'format-' . $post_format, 'class' => 'icon--md color-inherit' ] ) .
				'</div>';
	endif;
?>
<?php if ( has_post_thumbnail() ) : ?>
	<?php Hybrid\Carbon\Image::display( 'featured', [
		'size' => 'full',
		'class' => 'entry__image radius-md',
		'before' => '<figure class="margin-y-sm color-contrast-low ' . $image_aspect_ratio . '">' . $image_icon,
		'after' => '</figure>',
		'link' => true,
		'link_class' => 'entry__featured-image__link',
	] ) ?>
<?php elseif ( get_theme_mod( 'archive_image_placeholder', false ) && '' != get_theme_mod( 'featured_image_aspect_ratio', '' ) ) : ?>
	<a href="<?php echo esc_url( get_permalink() ) ?>" class="entry__featured-image__link color-contrast-low" aria-hidden="true">
		<div class="<?php echo esc_attr( $image_aspect_ratio ) ?> margin-y-sm radius-md">
			<div class="media-wrapper--icon flex items-center justify-center">
				<?php echo \Garrick\get_svg( [ 'icon' => 'format-' . $post_format, 'class' => 'icon--md color-inherit' ] ) ?>
			</div>
		</div>
	</a>
<?php endif ?>
