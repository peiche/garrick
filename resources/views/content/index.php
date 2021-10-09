<div class="app-content">

	<main id="main" class="app-main">

		<?php Hybrid\View\display( 'partials', 'archive-header' ) ?>

		<?php if ( have_posts() ) : ?>

			<?php if ( is_home() && ! is_paged() && \Garrick\has_featured_posts( 1 ) ) : ?>
				<?php Hybrid\View\display( 'entry/archive', 'featured' ) ?>
			<?php endif ?>

			<div class="container margin-y-lg max-width-lg">

				<div class="entry__wrapper grid gap-md grid-col-1 grid-col-3@md">

					<?php
						while ( have_posts() ) : the_post();
					?>
					<div class="col-1">
						<?php
							Hybrid\View\display( 'entry/archive', Hybrid\Post\hierarchy(), [ 'class' => 'text-sm' ] );
						?>
					</div>
					<?php
						endwhile;
					?>

				</div>

				<?php Hybrid\View\display( 'nav/pagination', 'posts' ) ?>

			</div>

		<?php endif ?>

	</main>

</div>
