<!DOCTYPE html>
<html <?php Hybrid\Attr\display( 'html' ) ?>>

<head>
<?php wp_head() ?>
</head>

<body <?php Hybrid\Attr\display( 'body' ) ?> data-theme="<?php echo esc_attr( get_theme_mod( 'color_theme', 'default' ) ) ?>">

<div class="app">

	<header id="app-header" class="app-header js-app-header flex flex-column justify-center">

		<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'trunc' ) ?></a>

		<div class="app-header__layout container max-width-xl flex items-center">
			<div class="app-header__branding flex items-center flex-shrink-0">

				<?php the_custom_logo() ?>

				<?php if ( display_header_text() ) : ?>
					<?php Hybrid\Site\display_title( [ 'class' => 'app-header__title margin-y-auto' ] ) ?>

					<?php if ( '' != Hybrid\Site\render_description() ) : ?>
						<span class="display@md">
							<span>&nbsp;<span class="sep">&middot;</span>&nbsp;</span>
							<?php Hybrid\Site\display_description( [ 'tag' => 'span' ] ) ?>
						</span>
					<?php endif ?>
				<?php endif ?>

			</div>

			<div class="app-header__nav js-app-header__nav flex items-center margin-left-auto">

				<?php Hybrid\View\display( 'nav/menu', 'primary', [ 'location' => 'primary' ] ) ?>

				<?php if ( get_theme_mod( 'show_theme_switch', 0 ) ) : ?>

					<div class="custom-checkbox custom-checkbox--icon margin-left-xxxs">
						<input class="custom-checkbox__input" type="checkbox" id="theme-switch" <?php if ( 'dark' == esc_attr( get_theme_mod( 'color_theme', 'default' ) ) ) { echo 'checked'; } ?>>
						<label class="custom-checkbox__label" for="theme-switch">Checkbox label</label>
						<div class="custom-checkbox__control" aria-hidden="true">
							<?php echo \Trunc\get_svg( [ 'icon' => 'sun', 'class' => 'icon--md' ] ) ?>
							<?php echo \Trunc\get_svg( [ 'icon' => 'moon', 'class' => 'icon--md' ] ) ?>
						</div>
					</div>

				<?php endif; ?>

				<?php if ( get_theme_mod( 'show_header_search', 0 ) ) : ?>
					<!-- <div class="expandable-search js-expandable-search">
						<?php get_search_form() ?>
					</div> -->
					<button type="button" id="search-show" class="btn btn--icon search-show flex-shrink-0">
						<?php echo \Trunc\get_svg( [ 'icon' => 'search' ] ) ?>
					</button>
				<?php endif; ?>

				<?php if ( has_nav_menu( 'primary' ) ) : ?>
					<button type="button" class="btn btn--icon hide@md nav-toggle flex-shrink-0" id="nav-toggle" aria-expanded="false">
						<?php echo \Trunc\get_svg( [ 'icon' => 'menu', 'class' => 'nav-toggle--menu' ] ) ?>
						<?php echo \Trunc\get_svg( [ 'icon' => 'close', 'class' => 'nav-toggle--close' ] ) ?>
						<span class="screen-reader-text"><?php esc_html_e( 'Menu', 'trunc' ) ?></span>
					</button>
				<?php endif; ?>

			</div>
		</div>

		<?php if ( get_theme_mod( 'show_header_search', 0 ) ) : ?>
			<div id="app-header__search" class="app-header__search is-hidden">
				<div class="container max-width-sm app-header__search__container">
					<?php get_search_form() ?>
					<button type="button" id="search-hide" class="btn btn--icon search-hide">
						<?php echo \Trunc\get_svg( [ 'icon' => 'close' ] ) ?>
						<span class="screen-reader-text"><?php echo esc_html_e( 'Search', 'trunc' ) ?></span>
					</button>
				</div>
			</div>
		<?php endif; ?>

	</header>

	<?php if ( is_front_page() ) :
		the_custom_header_markup();
	endif; ?>

