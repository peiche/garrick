<?php

add_filter( 'body_class', function( $classes ) {
	$classes[] = 'template--hero-header';

	return $classes;
} );

// Load header/* template.
Hybrid\View\display( 'header', Hybrid\Template\hierarchy() );

?>

<div class="app-content">

	<main id="main" class="app-main">

		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php Hybrid\Carbon\Image::display( 'featured', [
					'size' => 'full',
					'class' => 'entry__image',
					'before' => '<figure class="entry__featured margin-bottom-md">',
					'after' => '</figure>',
				] ) ?>

				<div class="container max-width-sm">
					<div class="entry__wrapper">

						<article <?php Hybrid\Attr\display( 'entry' ) ?>>

							<?php Hybrid\View\display( 'partials', 'post-header', [ 'hide_image' => 1 ] ) ?>

							<?php Hybrid\View\display( 'partials', 'post-content' ) ?>

							<?php Hybrid\View\display( 'partials', 'post-footer' ) ?>

						</article>

						<?php comments_template() ?>

					</div>
				</div>

			<?php endwhile ?>

		<?php endif ?>

	</main>

</div>

<?php

// Load footer/* template.
Hybrid\View\display( 'footer', Hybrid\Template\hierarchy() );
