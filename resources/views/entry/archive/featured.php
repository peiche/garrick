<?php
	$show_image = false;
	if ( has_post_thumbnail() || ( get_theme_mod( 'archive_image_placeholder', false ) && '' != get_theme_mod( 'featured_image_aspect_ratio', '' ) ) ) :
		$show_image = true;
	endif;

	$featured_posts = \Garrick\get_featured_posts();
	if ( empty( $featured_posts ) ) :
		return;
	endif;
?>

<div class="container max-width-xl">

	<?php
		/*
		 * setup_postdata() cannot be used without overriding global $post.
		 * @link https://github.com/WPTRT/theme-sniffer/issues/177
		 */
		global $post;
		foreach ( $featured_posts as $current_post ) :
			$post = $current_post; // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
			setup_postdata( $post );
	?>

	<article <?php Hybrid\Attr\display( 'entry col-12 text-sm' ) ?>>
		<div class="grid gap-md text-md">

			<?php if ( $show_image ) : ?>

				<div class="col-12 col-6@md flex items-center">
					<div class="width-100%">

						<?php Hybrid\View\display( 'partials', 'archive-image' ) ?>

					</div>
				</div>

			<?php endif ?>

			<div class="col-12<?php echo ( $show_image ? ' col-6@md' : ' ' ) ?> flex items-center">
				<div>

					<header class="entry__header">
						<div class="margin-bottom-xxxxs">
							<span class="badge badge--primary"><?php esc_html_e( 'Featured', 'garrick' ) ?></span>
						</div>
						<?php Hybrid\Post\display_title( [ 'class' => 'entry__title margin-top-auto' ] ) ?>
					</header>

					<?php Hybrid\View\display( 'partials', 'archive-excerpt', [ 'featured' => true ] ) ?>

					<div class="entry__footer">
						<div class="entry__byline">

							<?php if ( ! is_author() ) : ?>
								<?php Hybrid\View\display( 'partials', 'avatar', [ 'author' => get_post()->post_author, 'size' => 30 ] ) ?>
								<?php Hybrid\Post\display_author( [ 'after' => \Garrick\sep() ] ) ?>
							<?php endif ?>

							<a href="<?php echo esc_url( get_permalink() ) ?>" class="entry__permalink"><?php Hybrid\Post\display_date() ?></a>

							<?php if ( get_theme_mod( 'archive_show_tags', false ) && has_tag() ) : ?>
								<div class="margin-top-xs">
									<?php Hybrid\View\display( 'partials', 'post-terms', [ 'taxonomy' => 'post_tag' ] ) ?>
								</div>
							<?php endif ?>

						</div>
					</div>

				</div>
			</div>
		</div>
	</article>

	<?php
		endforeach;
		wp_reset_postdata();
	?>

</div>