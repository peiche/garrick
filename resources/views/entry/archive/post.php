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
				<?php Hybrid\View\display( 'partials', 'avatar', [ 'author' => get_post()->post_author, 'size' => 30 ] ) ?>
				<?php Hybrid\Post\display_author( [ 'after' => \Trunc\sep() ] ) ?>
			<?php endif ?>

			<a href="<?php echo esc_url( get_permalink() ) ?>" class="entry__permalink"><?php Hybrid\Post\display_date() ?></a>
		</div>
	</div>
</article>
