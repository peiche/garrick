<div class="app-content">

	<main id="main" class="app-main">

		<?php Hybrid\View\display( 'partials', 'archive-header' ) ?>

		<?php if ( have_posts() ) : ?>

			<?php if ( is_home() && ! is_paged() && \Garrick\has_featured_posts( 1 ) ) : ?>
				<?php Hybrid\View\display( 'entry/archive', 'featured' ) ?>
			<?php endif ?>

			<?php $archive_columns = get_theme_mod( 'archive_columns', 'stacked' ) ?>
			<div class="container margin-y-lg <?php echo ( 1 < $archive_columns ? 'max-width-lg' : 'max-width-sm' ) ?>">

				<div class="entry__wrapper grid gap-md">

					<?php
						while ( have_posts() ) : the_post();
							Hybrid\View\display( 'entry/archive', Hybrid\Post\hierarchy(), [ 'grid_class' => ( 1 < $archive_columns ? 'col-12 col-' . ( 12 / $archive_columns ) . '@md text-sm' : 'col-12' ) ] );
						endwhile;
					?>

				</div>

				<?php Hybrid\View\display( 'nav/pagination', 'posts' ) ?>

			</div>

		<?php endif ?>

	</main>

</div>
