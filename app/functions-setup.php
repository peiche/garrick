<?php
/**
 * Theme setup functions.
 *
 * This file holds basic theme setup functions executed on appropriate hooks
 * with some opinionated priorities based on theme dev, particularly working
 * with child theme devs/users, over the years. I've also decided to use
 * anonymous functions to keep these from being easily unhooked. WordPress has
 * an appropriate API for unregistering, removing, or modifying all of the
 * things in this file. Those APIs should be used instead of attempting to use
 * `remove_action()`.
 *
 * @package   Trunc
 * @author    Paul Eiche <paul@boldoak.design>
 * @copyright 2018 Paul Eiche
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://boldoak.design/themes/trunc
 */

namespace Trunc;

use Marando\Color\Color;

// $blah =  new Marando/Color/Color;

/**
 * Set up theme support.  This is where calls to `add_theme_support()` happen.
 *
 * @link   https://developer.wordpress.org/reference/functions/add_theme_support/
 * @link   https://developer.wordpress.org/themes/basics/theme-functions/
 * @link   https://developer.wordpress.org/reference/functions/load_theme_textdomain/
 * @link   https://github.com/WordPress/gutenberg/blob/master/docs/extensibility/theme-support.md
 * @since  1.0.0
 * @access public
 * @return void
 */
add_action( 'after_setup_theme', function() {

	// Sets the theme content width. This variable is also set in the
	// `resources/scss/settings/_dimensions.scss` file.
	$GLOBALS['content_width'] = 2000; // super wide for full width images

	// Load theme translations.
	load_theme_textdomain( 'trunc', get_parent_theme_file_path( 'resources/lang' ) );

	// Automatically add the `<title>` tag.
	add_theme_support( 'title-tag' );

	// Automatically add feed links to `<head>`.
	add_theme_support( 'automatic-feed-links' );

	// Adds featured image support.
	add_theme_support( 'post-thumbnails' );

	// Add selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Wide and full alignment. The styles for alignment is housed in the
	// `resources/scss/utilities/_alignment.scss` file.
	add_theme_support( 'align-wide' );

	// Outputs HTML5 markup for core features.
	add_theme_support( 'html5', [
		'caption',
		'comment-form',
		'comment-list',
		'gallery',
		'search-form'
	] );

	// Add custom logo support.
	add_theme_support( 'custom-logo', [
		'width'       => null,
		'height'      => null,
		'flex-width'  => null,
		'flex-height' => false,
		'header-text' => ''
	] );

	// Editor color palette. These colors are also defined in the
	// `resources/scss/settings/_colors.scss` file.
	add_theme_support( 'editor-color-palette', [

		[
			'name'  => __( 'Primary', 'trunc' ),
			'description' => __( 'test', 'trunc' ),
			'slug'  => 'primary',
			'color' => get_theme_mod('primary_color_light', '#2a6df4'),
		],
		[
			'name'  => __( 'Accent', 'trunc' ),
			'slug'  => 'accent',
			'color' => '#f54251',
		],
		[
			'name'  => __( 'Success', 'trunc' ),
			'slug'  => 'success',
			'color' => '#88c559',
		],
		[
			'name'  => __( 'Error', 'trunc' ),
			'slug'  => 'error',
			'color' => '#f54251',
		],
		[
			'name'  => __( 'Warning', 'trunc' ),
			'slug'  => 'warning',
			'color' => '#ffd138',
		],

		[
			'name'  => __( 'Higher Contrast', 'trunc' ),
			'slug'  => 'higher-contrast',
			'color' => '#1c1c21',
		],
		[
			'name'  => __( 'High Contrast', 'trunc' ),
			'slug'  => 'high-contrast',
			'color' => '#313135',
		],
		[
			'name'  => __( 'Medium Contrast', 'trunc' ),
			'slug'  => 'medium-contrast',
			'color' => '#79797c',
		],
		[
			'name'  => __( 'Low Contrast', 'trunc' ),
			'slug'  => 'low-contrast',
			'color' => '#d3d3d4',
		],
		[
			'name'  => __( 'Lower Contrast', 'trunc' ),
			'slug'  => 'lower-contrast',
			'color' => '#f2f2f2',
		],

	] );

	// Editor block font sizes. These font sizes are also defined in the
	// `resources/scss/settings/_fonts.scss` file.
	add_theme_support( 'editor-font-sizes', [
		[
			'name'      => __( 'Small', 'trunc' ),
			'shortName' => __( 'S', 'trunc' ),
			'size'      => 16,
			'slug'      => 'small'
		],
		[
			'name'      => __( 'Regular', 'trunc' ),
			'shortName' => __( 'M', 'trunc' ),
			'size'      => 20,
			'slug'      => 'regular'
		],
		[
			'name'      => __( 'Large', 'trunc' ),
			'shortName' => __( 'L', 'trunc' ),
			'size'      => 25,
			'slug'      => 'large'
		],
		[
			'name'      => __( 'Larger', 'trunc' ),
			'shortName' => __( 'XL', 'trunc' ),
			'size'      => 31,
			'slug'      => 'larger'
		]
	] );

	add_theme_support( 'post-formats', array(
		'aside',
		'audio',
		'chat',
		'gallery',
		'image',
		'link',
		'quote',
		'status',
		'video',
	) );

	// Add support for Jetpack SVG icons instead of the icon font.
	add_theme_support( 'jetpack-social-menu', 'svg' );

}, 5 );

/**
 * Adds support for the custom background feature. This is in its own function
 * hooked to `after_setup_theme` so that we can give it a later priority.  This
 * is so that child themes can more easily overwrite this feature.  Note that
 * overwriting the background should be done *before* rather than after.
 *
 * @link   https://developer.wordpress.org/reference/functions/add_theme_support/#custom-background
 * @since  1.0.0
 * @access public
 * @return void
 */
add_action( 'after_setup_theme', function() {

	// add_theme_support( 'custom-background', [
	// 	'default-image'          => '',
	// 	'default-preset'         => 'default',
	// 	'default-position-x'     => 'left',
	// 	'default-position-y'     => 'top',
	// 	'default-size'           => 'auto',
	// 	'default-repeat'         => 'repeat',
	// 	'default-attachment'     => 'scroll',
	// 	'default-color'          => '',
	// 	'wp-head-callback'       => '_custom_background_cb',
	// 	'admin-head-callback'    => '',
	// 	'admin-preview-callback' => '',
	// ] );

}, 15 );

/**
 * Adds support for the custom header feature. This is in its own function
 * hooked to `after_setup_theme` so that we can give it a later priority.  This
 * is so that child themes can more easily overwrite this feature.  Note that
 * overwriting the header should be done *before* rather than after.
 *
 * @link   https://developer.wordpress.org/reference/functions/add_theme_support/#custom-header
 * @since  1.0.0
 * @access public
 * @return void
 */
add_action( 'after_setup_theme', function() {

	add_theme_support( 'custom-header', [
	// 	'default-image'          => '',
	// 	'random-default'         => false,
	// 	'width'                  => 1600,
	// 	'height'                 => 500,
	// 	'flex-height'            => true,
	// 	'flex-width'             => true,
	// 	'default-text-color'     => '',
		'header-text'            => true,
	// 	'uploads'                => true,
	// 	'wp-head-callback'       => '',
	// 	'admin-head-callback'    => '',
	// 	'admin-preview-callback' => '',
	// 	'video'                  => true,
	// 	'video-active-callback'  => 'is_front_page'
	] );

}, 15 );

/**
 * Register menus.
 *
 * @link   https://developer.wordpress.org/reference/functions/register_nav_menus/
 * @since  1.0.0
 * @access public
 * @return void
 */
add_action( 'init', function() {

	register_nav_menus( [
		'primary' => esc_html_x( 'Primary', 'primary nav menu location', 'trunc' )
	] );

	register_nav_menus( [
		'footer' => esc_html_x( 'Footer', 'footer nav menu location', 'trunc' )
	] );

}, 5 );

/**
 * Register image sizes. Even if adding no custom image sizes or not adding
 * "thumbnails," it's still important to call `set_post_thumbnail_size()` so
 * that plugins that utilize the `post-thumbnail` size will have a properly-sized
 * thumbnail that matches the theme design.
 *
 * @link   https://developer.wordpress.org/reference/functions/set_post_thumbnail_size/
 * @link   https://developer.wordpress.org/reference/functions/add_image_size/
 * @since  1.0.0
 * @access public
 * @return void
 */
add_action( 'init', function() {

	// Set the `post-thumbnail` size.
	set_post_thumbnail_size( 178, 100, true );

	// Register custom image sizes.
	add_image_size( 'trunc-medium', 750, 422, true );

}, 5 );

/**
 * Register sidebars.
 *
 * @link   https://developer.wordpress.org/reference/functions/register_sidebar/
 * @link   https://developer.wordpress.org/reference/functions/register_sidebars/
 * @since  1.0.0
 * @access public
 * @return void
 */
add_action( 'widgets_init', function() {

	$args = [
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget__title margin-top-auto">',
		'after_title'   => '</h3>'
	];

	register_sidebar( [
		'id'   => 'footer',
		'name' => esc_html_x( 'Footer', 'sidebar', 'trunc' )
	] + $args );

}, 5 );

/**
 * Add SVG definitions to the footer.
 *
 * @link   https://developer.wordpress.org/reference/hooks/wp_footer/
 * @since  1.0.0
 * @access public
 * @return void
 */
add_action( 'wp_footer', function() {
	// Define SVG sprite file.
	$svg_icons = get_parent_theme_file_path( '/dist/img/icons.svg' );

	// If it exists, include it.
	if ( file_exists( $svg_icons ) ) {
		require_once $svg_icons; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
	}
}, 9999 );

/**
 * Add arrow icon if menu item has children.
 *
 * @link   https://developer.wordpress.org/reference/hooks/nav_menu_item_title/
 * @since  1.0.0
 * @access public
 * @return void
 */
add_filter( 'nav_menu_item_title', function( $title, $item, $args, $depth ) {
	if ( 'primary' === $args->theme_location ) {
		foreach ( $item->classes as $value ) {
			if ( 'menu-item-has-children' === $value || 'page_item_has_children' === $value ) {
				$title = $title . get_svg( [ 'icon' => 'chevron-down-small' ] );
			}
		}
	}

	return $title;
}, 10, 4 );

/**
 * Override default search form.
 *
 * @link   https://developer.wordpress.org/reference/hooks/get_search_form/
 * @since  1.0.0
 * @access public
 * @return void
 */
add_filter( 'get_search_form', function( $html ) {
	echo \Hybrid\View\display( 'partials', 'search-form' );
	return '';
} );

/**
 * Override default password form.
 *
 * @link   https://developer.wordpress.org/reference/hooks/the_password_form/
 * @since  1.0.0
 * @access public
 * @return void
 */
add_filter( 'the_password_form', function( $html ) {
	return \Hybrid\View\display( 'partials', 'password-form' );
} );

add_filter( 'excerpt_more', function() {
	return '...';
} );

add_filter( 'body_class', function( $classes ) {
	if ( is_singular() && has_post_thumbnail() ) :
		$classes[] = 'single-has-post-thumbnail';
	endif;

	return $classes;
} );

add_filter( 'get_avatar', function( $class ) {
	return str_replace( "class='avatar avatar-", "class='avatar__img avatar__img--", $class );
} );

add_action( 'wp_head', function() {
	$primary_light = Color::hex( get_theme_mod( 'primary_color_light', '#2a6df4' ) );
	$primary_light_h = $primary_light->h;
	$primary_light_s = $primary_light->s * 100;
	$primary_light_l = $primary_light->l * 100;
	$primary_dark = Color::hex( get_theme_mod( 'primary_color_dark', '#41b4e1' ) );
	$primary_dark_h = $primary_dark->h;
	$primary_dark_s = $primary_dark->s * 100;
	$primary_dark_l = $primary_dark->l * 100;
	?>

<style type="text/css">
	:root,
	[data-theme=default] {
		--color-primary-darker: hsl(<?php echo esc_attr( $primary_light_h ) ?>, <?php echo esc_attr( $primary_light_s ) ?>%, <?php echo esc_attr( $primary_light_l - 20 ) ?>%);
	    --color-primary-darker-h: <?php echo esc_attr( $primary_light_h ) ?>;
	    --color-primary-darker-s: <?php echo esc_attr( $primary_light_s ) ?>%;
	    --color-primary-darker-l: <?php echo esc_attr( $primary_light_l - 20 ) ?>%;
	    --color-primary-dark: hsl(<?php echo esc_attr( $primary_light_h ) ?>, <?php echo esc_attr( $primary_light_s ) ?>%, <?php echo esc_attr( $primary_light_l - 10 ) ?>%);
	    --color-primary-dark-h: <?php echo esc_attr( $primary_light_h ) ?>;
	    --color-primary-dark-s: <?php echo esc_attr( $primary_light_s ) ?>%;
	    --color-primary-dark-l: <?php echo esc_attr( $primary_light_l - 10 ) ?>%;
		--color-primary: hsl(<?php echo esc_attr( $primary_light_h ) ?>, <?php echo esc_attr( $primary_light_s ) ?>%, <?php echo esc_attr( $primary_light_l ) ?>%);
	    --color-primary-h: <?php echo esc_attr( $primary_light_h ) ?>;
	    --color-primary-s: <?php echo esc_attr( $primary_light_s ) ?>%;
	    --color-primary-l: <?php echo esc_attr( $primary_light_l ) ?>%;
		--color-primary-light: hsl(<?php echo esc_attr( $primary_light_h ) ?>, <?php echo esc_attr( $primary_light_s ) ?>%, <?php echo esc_attr( $primary_light_l + 10 ) ?>%);
	    --color-primary-light-h: <?php echo esc_attr( $primary_light_h ) ?>;
	    --color-primary-light-s: <?php echo esc_attr( $primary_light_s ) ?>%;
	    --color-primary-light-l: <?php echo esc_attr( $primary_light_l + 10 ) ?>%;
	    --color-primary-lighter: hsl(<?php echo esc_attr( $primary_light_h ) ?>, <?php echo esc_attr( $primary_light_s ) ?>%, <?php echo esc_attr( $primary_light_l + 20 ) ?>%);
	    --color-primary-lighter-h: <?php echo esc_attr( $primary_light_h ) ?>;
	    --color-primary-lighter-s: <?php echo esc_attr( $primary_light_s ) ?>%;
	    --color-primary-lighter-l: <?php echo esc_attr( $primary_light_l + 20 ) ?>%;
	}
	[data-theme="dark"],
	.theme-dark {
		--color-primary-darker: hsl(<?php echo esc_attr( $primary_dark_h ) ?>, <?php echo esc_attr( $primary_dark_s ) ?>%, <?php echo esc_attr( $primary_dark_l - 20 ) ?>%);
	    --color-primary-darker-h: <?php echo esc_attr( $primary_dark_h ) ?>;
	    --color-primary-darker-s: <?php echo esc_attr( $primary_dark_s ) ?>%;
	    --color-primary-darker-l: <?php echo esc_attr( $primary_dark_l - 20 ) ?>%;
	    --color-primary-dark: hsl(<?php echo esc_attr( $primary_dark_h ) ?>, <?php echo esc_attr( $primary_dark_s ) ?>%, <?php echo esc_attr( $primary_dark_l - 10 ) ?>%);
	    --color-primary-dark-h: <?php echo esc_attr( $primary_dark_h ) ?>;
	    --color-primary-dark-s: <?php echo esc_attr( $primary_dark_s ) ?>%;
	    --color-primary-dark-l: <?php echo esc_attr( $primary_dark_l - 10 ) ?>%;
		--color-primary: hsl(<?php echo esc_attr( $primary_dark_h ) ?>, <?php echo esc_attr( $primary_dark_s ) ?>%, <?php echo esc_attr( $primary_dark_l ) ?>%);
	    --color-primary-h: <?php echo esc_attr( $primary_dark_h ) ?>;
	    --color-primary-s: <?php echo esc_attr( $primary_dark_s ) ?>%;
	    --color-primary-l: <?php echo esc_attr( $primary_dark_l ) ?>%;
		--color-primary-light: hsl(<?php echo esc_attr( $primary_dark_h ) ?>, <?php echo esc_attr( $primary_dark_s ) ?>%, <?php echo esc_attr( $primary_dark_l + 10 ) ?>%);
	    --color-primary-light-h: <?php echo esc_attr( $primary_dark_h ) ?>;
	    --color-primary-light-s: <?php echo esc_attr( $primary_dark_s ) ?>%;
	    --color-primary-light-l: <?php echo esc_attr( $primary_dark_l + 10 ) ?>%;
	    --color-primary-lighter: hsl(<?php echo esc_attr( $primary_dark_h ) ?>, <?php echo esc_attr( $primary_dark_s ) ?>%, <?php echo esc_attr( $primary_dark_l + 20 ) ?>%);
	    --color-primary-lighter-h: <?php echo esc_attr( $primary_dark_h ) ?>;
	    --color-primary-lighter-s: <?php echo esc_attr( $primary_dark_s ) ?>%;
	    --color-primary-lighter-l: <?php echo esc_attr( $primary_dark_l + 20 ) ?>%;
	}
	<?php if ( '' != get_theme_mod( 'header_color', '' ) ) : ?>
	.app-header {
		--color-bg: <?php echo esc_attr( get_theme_mod( 'header_color', '' ) ) ?>;
	}
	<?php endif ?>
	<?php if ( '' != get_theme_mod( 'footer_color', '' ) ) : ?>
	.app-footer {
		--color-bg: <?php echo esc_attr( get_theme_mod( 'footer_color', '' ) ) ?>;
	}
	.app-footer__content {
		border-top: 0;
	}
	<?php endif ?>
</style>

	<?php
} );

add_action( 'hybrid/templates/register', function( $templates ) {

	$templates->add(
		'template/hero-header.php',
		[
			'label'      => __( 'Hero Header', 'trunc' ),
			'post_types' => [ 'post', 'page' ]
		]
	);

	$templates->add(
		'template/no-header.php',
		[
			'label'      => __( 'No Header', 'trunc' ),
			'post_types' => [ 'post', 'page' ]
		]
	);

	$templates->add(
		'template/no-image.php',
		[
			'label'      => __( 'No Featured Image', 'trunc' ),
			'post_types' => [ 'post', 'page' ]
		]
	);

	$templates->add(
		'template/full-width.php',
		[
			'label'      => __( 'Full Width', 'trunc' ),
			'post_types' => [ 'post', 'page' ]
		]
	);

	$templates->add(
		'template/cover-header.php',
		[
			'label'	     => __( 'Cover Header', 'trunc' ),
			'post_types' => [ 'post', 'page' ]
		]
	);

} );
