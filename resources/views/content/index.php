<div class="app-content">

	<main id="main" class="app-main">

		<?php Hybrid\View\display( 'partials', 'archive-header' ) ?>

		<?php if ( have_posts() ) : ?>

			<?php $archive_columns = get_theme_mod( 'archive_columns', 'stacked' ) ?>

			<div class="container margin-y-lg <?php echo ( 1 < $archive_columns ? 'max-width-lg' : 'max-width-sm' ) ?>">

				<div class="entry__wrapper grid grid-gap-md">

					<?php
						$i = 0;
						while ( have_posts() ) : the_post();
							if ( 0 == $i ) :
								Hybrid\View\display( 'entry/archive', 'featured' );
							else :
								Hybrid\View\display( 'entry/archive', Hybrid\Post\hierarchy(), [ 'grid_class' => ( 1 < $archive_columns ? 'col-12 col-' . ( 12 / $archive_columns ) . '@md' : 'col-12' ) ] );
							endif;
							$i++;
						endwhile;
					?>

				</div>

				<?php Hybrid\View\display( 'nav/pagination', 'posts' ) ?>

			</div>

		<?php endif ?>

	</main>

</div>
