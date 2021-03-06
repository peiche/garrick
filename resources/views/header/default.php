<!DOCTYPE html>
<html <?php Hybrid\Attr\display( 'html' ) ?> data-theme="<?php echo esc_attr( get_theme_mod( 'color_theme', 'default' ) ) ?>">

<head>
<?php wp_head() ?>
</head>

<body <?php Hybrid\Attr\display( 'body' ) ?>>

<div class="app">

	<header id="app-header" class="app-header js-app-header flex flex-column justify-center">

		<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'garrick' ) ?></a>

		<div class="app-header__layout container max-width-lg flex items-center">
			<div class="app-header__branding flex items-center flex-shrink-0">

				<?php the_custom_logo() ?>

				<?php
					$title_class = 'app-header__title margin-y-auto';
					$hide_title_on_mobile = get_theme_mod( 'hide_title_on_mobile', false );
					if ( $hide_title_on_mobile ) :
						$title_class = $title_class . ' display@md';
					endif;
				?>
				<?php if ( display_header_text() ) : ?>
					<?php Hybrid\Site\display_title( [ 'class' => $title_class ] ) ?>

					<?php if ( '' != Hybrid\Site\render_description() ) : ?>
						<span class="display@md flex items-center">
							<span class="margin-x-xxs"><?php echo \Garrick\sep() ?></span>
							<?php Hybrid\Site\display_description( [ 'tag' => 'span' ] ) ?>
						</span>
					<?php endif ?>
				<?php endif ?>

			</div>

			<div class="app-header__nav js-app-header__nav flex items-center margin-left-auto">

				<?php Hybrid\View\display( 'nav/menu', 'primary', [ 'location' => 'primary' ] ) ?>

				<?php if ( get_theme_mod( 'show_theme_switch', 0 ) ) : ?>

					<div id="theme-switch" class="theme-switch margin-right-xxs margin-left-sm inline-flex">
						<input type="checkbox" id="theme-switch__input" value="dark" class="theme-switch__input"<?php if ( 'dark' == esc_attr( get_theme_mod( 'color_theme', 'default' ) ) ) { echo ' checked'; } ?>>
						<label for="theme-switch__input" class="theme-switch__label screen-reader-text"><?php esc_html_e( 'Toggle theme', 'garrick' ) ?></label>
						<?php echo \Garrick\get_svg( [ 'icon' => 'moon', 'class' => 'icon--md icon--stroke-none theme-switch__icon theme-switch__icon--off' ] ) ?>
						<?php echo \Garrick\get_svg( [ 'icon' => 'sun', 'class' => 'icon--md icon--stroke-none theme-switch__icon theme-switch__icon--on' ] ) ?>
					</div>

				<?php endif; ?>

				<?php if ( get_theme_mod( 'show_header_search', 0 ) ) : ?>
					<button type="button" id="search-show" class="btn btn--icon search-show">
						<?php echo \Garrick\get_svg( [ 'icon' => 'search' ] ) ?>
						<span class="screen-reader-text"><?php esc_html_e( 'Search', 'garrick' ) ?></span>
					</button>
				<?php endif; ?>

				<button type="button" id="menu-toggle" class="btn btn--icon menu-toggle hide@md" aria-haspopup="true" aria-expanded="false">
					<?php echo \Garrick\get_svg( [ 'icon' => 'menu', 'class' => 'menu-toggle__icon menu-toggle__icon--off' ] ) ?>
					<?php echo \Garrick\get_svg( [ 'icon' => 'close', 'class' => 'menu-toggle__icon menu-toggle__icon--on' ] ) ?>
					<span class="screen-reader-text"><?php esc_html_e( 'Toggle menu', 'garrick' ) ?></span>
				</button>

			</div>
		</div>

		<?php if ( get_theme_mod( 'show_header_search', 0 ) ) : ?>
			<div id="app-header__search" class="app-header__search container max-width-lg is-hidden">
				<?php get_search_form() ?>
				<button type="button" id="search-hide" class="btn btn--icon search-hide">
					<?php echo \Garrick\get_svg( [ 'icon' => 'close' ] ) ?>
					<span class="screen-reader-text"><?php echo esc_html_e( 'Search', 'garrick' ) ?></span>
				</button>
			</div>
		<?php endif; ?>

	</header>

	<?php if ( is_front_page() ) :
		the_custom_header_markup();
	endif; ?>

