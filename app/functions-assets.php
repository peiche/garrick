<?php
/**
 * Asset-related functions and filters.
 *
 * This file holds some setup actions for scripts and styles as well as a helper
 * functions for work with assets.
 *
 * @package   Garrick
 * @author    Paul Eiche <paul@boldoak.design>
 * @copyright 2018 Paul Eiche
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://boldoak.design/work/garrick
 */

namespace Garrick;

use Hybrid\App;
use Hybrid\Font;

/**
 * Enqueue scripts/styles for the front end.
 *
 * @link   https://developer.wordpress.org/reference/functions/wp_enqueue_script/
 * @link   https://developer.wordpress.org/reference/functions/wp_enqueue_style/
 * @since  1.0.0
 * @access public
 * @return void
 */
add_action( 'wp_enqueue_scripts', function() {

	// Disable core block styles.
	wp_dequeue_style( 'wp-block-library' );

	// Load WordPress' comment-reply script where appropriate.
	if ( is_singular() && get_option( 'thread_comments' ) && comments_open() ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Enqueue theme scripts.
	wp_enqueue_script( 'codyhouse-util', asset( 'js/util.js' ), null, null, true );
	wp_enqueue_script( 'garrick-app', asset( 'js/app.js' ), null, null, true );

	// Enqueue theme styles.
	wp_enqueue_style( 'garrick-screen', asset( 'css/screen.css' ), null, null );

	// Enqueue fonts set in Customizer.
	$font_primary = get_theme_mod( 'font_primary', '|' );
	$font_heading = get_theme_mod( 'font_heading', '|' );
	$font_mono    = get_theme_mod( 'font_mono', '|' );

	$fonts = array();
	if ( '|' != $font_primary ) :
		$fonts[] = $font_primary;
	endif;
	if ( '|' != $font_heading ) :
		$fonts[] = $font_heading;
	endif;
	if ( '|' != $font_mono ) :
		$fonts[] = $font_mono;
	endif;

	if ( count( $fonts ) > 0 ) :

		// Register Google Fonts.
		// @link https://github.com/justintadlock/hybrid-font
		// @link https://fonts.google.com
		Font\enqueue( 'garrick', [
			'family' => $fonts,
			'subset' => [
				'latin',
				'latin-ext'
			],
			'display' => 'fallback',
		] );

	endif;

} );

/**
 * Enqueue scripts/styles for the editor.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
add_action( 'enqueue_block_editor_assets', function() {

	// Enqueue theme editor styles.
	wp_enqueue_style( 'garrick-editor', asset( 'css/editor.css' ), null, null );

	// Unregister core block and theme styles.
	// wp_deregister_style( 'wp-block-library' );
} );

/**
 * Helper function for outputting an asset URL in the theme. This integrates
 * with Laravel Mix for handling cache busting. If used when you enqueue a script
 * or style, it'll append an ID to the filename.
 *
 * @link   https://laravel.com/docs/5.6/mix#versioning-and-cache-busting
 * @since  1.0.0
 * @access public
 * @param  string  $path  A relative path/file to append to the `dist` folder.
 * @return string
 */
function asset( $path ) {

	// Get the Laravel Mix manifest.
	$manifest = App::resolve( 'garrick/mix' );

	// Make sure to trim any slashes from the front of the path.
	$path = '/' . ltrim( $path, '/' );

	if ( $manifest && isset( $manifest[ $path ] ) ) {
		$path = $manifest[ $path ];
	}

	return get_parent_theme_file_uri( 'dist' . $path );
}
