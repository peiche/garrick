<div class="app-content">

	<main id="main" class="app-main">

		<div class="container max-width-sm">
			<div class="entry__wrapper">

				<?php if ( have_posts() ) : ?>

					<?php while ( have_posts() ) : the_post(); ?>

						<?php Hybrid\View\display( 'entry/single', Hybrid\Post\hierarchy() ) ?>

						<?php comments_template() ?>

					<?php endwhile ?>

				<?php endif ?>

			</div>

		</div>

	</main>

</div>
