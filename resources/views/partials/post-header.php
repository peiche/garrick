<?php
	$cover_image = false;
	if ( array_key_exists( 'cover_image', $data) && $data->cover_image ) :
		$cover_image = true;
	endif;
?>

<header class="entry__header entry__header--single <?php echo $cover_image ? 'alignfull flex items-center' : 'margin-y-lg' ?>">
	<div class="<?php echo $cover_image ? 'container max-width-sm margin-top-xxxl margin-bottom-xl' : 'margin-bottom-md' ?>">
		<?php Hybrid\Post\display_title( [ 'class' => 'entry__title text-xxxl' ] ) ?>

		<?php $post_content_excerpt = preg_split( '/<!--more(.*?)?-->/', get_post()->post_content ); ?>
		<?php if ( has_excerpt() && strcasecmp( trim( get_the_excerpt() ), trim( $post_content_excerpt[0] ) ) != 0 ) : ?>
			<div class="entry__excerpt margin-bottom-sm text-md color-contrast-medium">
				<?php the_excerpt() ?>
			</div>
		<?php endif; ?>

		<?php if ( is_single() ) : ?>
			<div class="entry__byline">
				<div class="avatar avatar--md">
					<figure class="avatar__figure" role="img" aria-hidden="true">
						<?php echo \Trunc\get_svg( [ 'icon' => 'avatar', 'class' => 'avatar__placeholder' ] ) ?>
						<?php echo get_avatar( get_post()->post_author, 96, '', '', [ 'class' => 'avatar__img' ] ) ?>
					</figure>
				</div>
				<?php Hybrid\Post\display_author() ?>
				<?php Hybrid\Post\display_date( [ 'before' => \Trunc\sep() ] ) ?>
			</div>
		<?php endif; ?>

	</div>

	<?php
		$show_image = true;
		if ( array_key_exists( 'hide_image', $data) && $data->hide_image ) :
			$show_image = false;
		endif;
	?>

	<?php if ( $show_image ) : ?>
		<?php Hybrid\Carbon\Image::display( 'featured', [
			'size' => 'full',
			'class' => 'entry__image',
			'before' => '<figure class="entry__featured ' . ( $cover_image ? '' : 'alignwide margin-y-md margin-x-auto' ) . '">',
			'after' => '</figure>',
		] ) ?>
	<?php endif; ?>

</header>
