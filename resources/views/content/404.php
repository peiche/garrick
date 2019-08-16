<div class="app-content">

	<main id="main" class="app-main">

		<div class="container max-width-sm margin-y-lg">

			<div class="entry__wrapper">

				<div class="entry entry--error">

					<h1 class="entry__title margin-bottom-xxs"><?php esc_html_e( 'Not Found', 'trunc' ) ?></h1>

					<div class="entry__content">
						<p><?php esc_html_e( 'It looks like you took a wrong turn somewhere. Maybe a search would help.', 'trunc' ) ?></p>

						<?php get_search_form() ?>
					</div>

				</div>

			</div>

		</div>

	</main>

</div>
