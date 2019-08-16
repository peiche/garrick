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

</article>
