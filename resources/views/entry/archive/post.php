<article <?php Hybrid\Attr\display( 'entry padding-y-md' ) ?>>

	<header class="entry__header">
		<?php Hybrid\Post\display_title( [ 'class' => 'entry__title margin-top-auto' ] ) ?>
	</header>

	<?php Hybrid\Carbon\Image::display( 'featured', [
		'size' => 'full',
		'class' => 'entry__image',
		'before' => '<figure class="media-wrapper margin-y-sm">',
		'after' => '</figure>',
		'link' => true,
		'link_class' => 'entry__featured-image__link',
	] ) ?>

	<div class="entry__summary margin-y-sm">
		<?php the_excerpt() ?>
	</div>

	<div class="entry__footer">
		<div class="entry__byline">

			<?php if ( ! is_author() ) : ?>
				<div class="avatar avatar--sm">
					<figure class="avatar__figure" role="img" aria-hidden="true">
						<?php echo \Trunc\get_svg( [ 'icon' => 'avatar', 'class' => 'avatar__placeholder' ] ) ?>
						<?php echo get_avatar( get_post()->post_author, 96, '', '', [ 'class' => 'avatar__img' ] ) ?>
					</figure>
				</div>
				<?php Hybrid\Post\display_author( [ 'after' => \Trunc\sep() ] ) ?>
			<?php endif ?>

			<a href="<?php echo esc_url( get_permalink() ) ?>" class="entry__permalink"><?php Hybrid\Post\display_date() ?></a>
		</div>
	</div>
</article>
