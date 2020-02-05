<article <?php Hybrid\Attr\display( 'entry ' ) ?>>
	<div class="grid grid-gap-md">
		<div class="col-12 col-6@md flex items-center">
			<div class="width-100%">

				<?php Hybrid\View\display( 'partials', 'archive-image' ) ?>

			</div>
		</div>
		<div class="col-12 col-6@md flex items-center">
			<div>

				<header class="entry__header">
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
