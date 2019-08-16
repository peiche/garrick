<div class="app-content">

	<main id="main" class="app-main">

		<?php Hybrid\View\display( 'partials', 'archive-header' ) ?>

		<?php if ( have_posts() ) : ?>

			<div class="container max-width-sm margin-y-lg">

				<div class="entry__wrapper">

					<?php while ( have_posts() ) : the_post(); ?>

						<?php Hybrid\View\display( 'entry/archive', Hybrid\Post\hierarchy() ) ?>

					<?php endwhile ?>

					<?php Hybrid\View\display( 'nav/pagination', 'posts' ) ?>

				</div>

			</div>

		<?php endif ?>

	</main>

</div>
