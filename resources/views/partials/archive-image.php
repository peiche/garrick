<?php
	$post_format = get_post_format() ?: 'standard';
	$days = get_theme_mod( 'archive_new_days_count', false );

	if ( has_post_thumbnail() && '' != get_the_post_thumbnail_url() ) :
		$image_icon = '<div class="media-wrapper--icon flex items-center justify-center">' .
				\Garrick\get_svg( [ 'icon' => 'format-' . $post_format, 'class' => 'icon--md color-inherit' ] ) .
				'</div>';
		$image_label = '';
		
		if ( $days > 0 && ( time() - ( 86400 * $days ) ) < get_the_date( 'U' ) ) :
			$image_label = '<div class="media-wrapper--label">' . __( 'New', 'garrick' ) . '</div>';
		endif;

		Hybrid\Carbon\Image::display( 'featured', [
			'size' => 'full',
			'class' => 'entry__image radius-md',
			'before' => '<figure class="margin-y-sm color-contrast-low media-wrapper media-wrapper--4:3 bg-contrast-lower radius-md position-relative">' . $image_icon . $image_label,
			'after' => '</figure>',
			'link' => true,
			'link_class' => 'entry__featured-image__link',
		] );
	else : 
?>
	<a href="<?php echo esc_url( get_permalink() ) ?>" class="entry__featured-image__link color-contrast-low" aria-hidden="true">
		<div class="margin-y-sm color-contrast-low media-wrapper media-wrapper--4:3 bg-contrast-lower radius-md position-relative">
			<?php if ( $days > 0 && ( time() - ( 86400 * $days ) ) < get_the_date( 'U' ) ) : ?>
				<div class="media-wrapper--label">
					<?php echo esc_html( 'New', 'garrick' ) ?>
				</div>
			<?php endif ?>
			<div class="media-wrapper--icon flex items-center justify-center">
				<?php echo \Garrick\get_svg( [ 'icon' => 'format-' . $post_format, 'class' => 'icon--md color-inherit' ] ) ?>
			</div>
		</div>
	</a>
<?php endif; ?>
