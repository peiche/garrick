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
 * @package   Garrick
 * @author    Paul Eiche <paul@boldoak.design>
 * @copyright 2018 Paul Eiche
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://boldoak.design/themes/garrick
 */

namespace Garrick;

use Marando\Color\Color;

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
	load_theme_textdomain( 'garrick', get_parent_theme_file_path( 'resources/lang' ) );

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
	// @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#wide-alignment
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
			'name'  => __( 'Primary', 'garrick' ),
			'description' => __( 'test', 'garrick' ),
			'slug'  => 'primary',
			'color' => get_theme_mod('primary_color_light', '#2a6df4'),
		],
		[
			'name'  => __( 'Accent', 'garrick' ),
			'slug'  => 'accent',
			'color' => '#f54251',
		],
		[
			'name'  => __( 'Success', 'garrick' ),
			'slug'  => 'success',
			'color' => '#88c559',
		],
		[
			'name'  => __( 'Error', 'garrick' ),
			'slug'  => 'error',
			'color' => '#f54251',
		],
		[
			'name'  => __( 'Warning', 'garrick' ),
			'slug'  => 'warning',
			'color' => '#ffd138',
		],

		[
			'name'  => __( 'Higher Contrast', 'garrick' ),
			'slug'  => 'higher-contrast',
			'color' => '#1c1c21',
		],
		[
			'name'  => __( 'High Contrast', 'garrick' ),
			'slug'  => 'high-contrast',
			'color' => '#313135',
		],
		[
			'name'  => __( 'Medium Contrast', 'garrick' ),
			'slug'  => 'medium-contrast',
			'color' => '#79797c',
		],
		[
			'name'  => __( 'Low Contrast', 'garrick' ),
			'slug'  => 'low-contrast',
			'color' => '#d3d3d4',
		],
		[
			'name'  => __( 'Lower Contrast', 'garrick' ),
			'slug'  => 'lower-contrast',
			'color' => '#f2f2f2',
		],
		[
			'name'  => __( 'Black', 'garrick' ),
			'slug'  => 'black',
			'color' => '#000',
		],
		[
			'name'  => __( 'White', 'garrick' ),
			'slug'  => 'white',
			'color' => '#fff',
		],

	] );

	// Editor block font sizes. These font sizes are also defined in the
	// `resources/scss/settings/_fonts.scss` file.
	add_theme_support( 'editor-font-sizes', [
		[
			'name'      => __( 'Small', 'garrick' ),
			'shortName' => __( 'S', 'garrick' ),
			'size'      => 16,
			'slug'      => 'small'
		],
		[
			'name'      => __( 'Regular', 'garrick' ),
			'shortName' => __( 'M', 'garrick' ),
			'size'      => 20,
			'slug'      => 'regular'
		],
		[
			'name'      => __( 'Large', 'garrick' ),
			'shortName' => __( 'L', 'garrick' ),
			'size'      => 25,
			'slug'      => 'large'
		],
		[
			'name'      => __( 'Larger', 'garrick' ),
			'shortName' => __( 'XL', 'garrick' ),
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

	// Add support for Jetpack featured content.
	// @link https://jetpack.com/support/featured-content/
	add_theme_support( 'featured-content', array(
		'filter'     => 'garrick_get_featured_posts',
		'max_posts'  => 1,
		'post_types' => array( 'post' ),
	));

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
add_action( 'after_setup_theme', function() {}, 15 );

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
		'header-text'            => true,
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
		'primary' => esc_html_x( 'Primary', 'primary nav menu location', 'garrick' )
	] );

	register_nav_menus( [
		'footer' => esc_html_x( 'Footer', 'footer nav menu location', 'garrick' )
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
	add_image_size( 'garrick-medium', 750, 422, true );

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
		'before_title'  => '<h3 class="widget__title margin-top-auto margin-bottom-sm">',
		'after_title'   => '</h3>'
	];

	register_sidebar( [
		'id'   => 'footer',
		'name' => esc_html_x( 'Footer', 'sidebar', 'garrick' )
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
 * Echoes custom form and returns empty string to avoid outputting
 * duplicate forms.
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
 * @return $html
 */
add_filter( 'the_password_form', function( $html ) {
	return \Hybrid\View\display( 'partials', 'password-form' );
} );

/**
 *
 * @link https://developer.wordpress.org/reference/hooks/excerpt_more/
 * @since 1.0.0
 * @access public
 * @return String
 */
add_filter( 'excerpt_more', function() {
	return '...';
} );

/**
 * Add a class to the body indicating when
 * the post or page has a featured image.
 *
 * @link https://developer.wordpress.org/reference/hooks/body_class/
 * @since 1.0.0
 * @access public
 * @return $classes
 */
add_filter( 'body_class', function( $classes ) {
	if ( is_singular() && has_post_thumbnail() ) :
		$classes[] = 'single-has-post-thumbnail';
	endif;

	return $classes;
} );

/**
 * Add in custom properties (CSS variables) from Customizer.
 *
 * @link https://developer.wordpress.org/reference/hooks/wp_head/
 * @since 1.0.0
 * @access public
 * @return void
 */
add_action( 'wp_head', function() {
	$font_primary = explode( '|', get_theme_mod( 'font_primary', '' ) )[ 0 ];
	$font_heading = explode( '|', get_theme_mod( 'font_heading', '' ) )[ 0 ];
	$font_mono = explode( '|', get_theme_mod( 'font_mono', '' ) )[ 0 ];
	$font_weight_heading = get_theme_mod( 'font_weight_heading', 'var(--font-weight-bold)' );
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
	body {
		<?php if ( '' != $font_primary ) : ?>
		--font-primary: <?php echo $font_primary // phpcs:ignore WordPress.XSS.EscapeOutput.OutputNotEscaped ?>;
		<?php endif ?>

		<?php if ( '' != $font_heading ) : ?>
		--font-heading: <?php echo $font_heading // phpcs:ignore WordPress.XSS.EscapeOutput.OutputNotEscaped ?>;
		<?php endif ?>

		<?php if ( '' != $font_mono ) : ?>
		--font-mono: <?php echo $font_mono // phpcs:ignore WordPress.XSS.EscapeOutput.OutputNotEscaped ?>;
		<?php endif ?>

		--font-weight-heading: <?php echo $font_weight_heading // phpcs:ignore WordPress.XSS.EscapeOutput.OutputNotEscaped ?>;
	}

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
</style>

	<?php
} );

/**
 * Add post/page templates.
 */
add_action( 'hybrid/templates/register', function( $templates ) {

	$templates->add(
		'template/hero-header.php',
		[
			'label'      => __( 'Hero Header', 'garrick' ),
			'post_types' => [ 'post', 'page' ]
		]
	);

	$templates->add(
		'template/no-header.php',
		[
			'label'      => __( 'No Header', 'garrick' ),
			'post_types' => [ 'post', 'page' ]
		]
	);

	$templates->add(
		'template/no-image.php',
		[
			'label'      => __( 'No Featured Image', 'garrick' ),
			'post_types' => [ 'post', 'page' ]
		]
	);

	$templates->add(
		'template/full-width.php',
		[
			'label'      => __( 'Full Width', 'garrick' ),
			'post_types' => [ 'post', 'page' ]
		]
	);

	$templates->add(
		'template/cover-header.php',
		[
			'label'	     => __( 'Cover Header', 'garrick' ),
			'post_types' => [ 'post', 'page' ]
		]
	);

} );
