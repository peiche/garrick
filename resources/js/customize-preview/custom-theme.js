/**
 * Custom color theme preview.
 *
 * This file handles the JavaScript for the live preview of the `color`
 * feature in the customizer.
 *
 * @package   Trunc
 * @author    Paul Eiche <paul@boldoak.design>
 * @copyright 2018 Paul Eiche
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://boldoak.design/themes/trunc
 */

/* global wp */

// Color theme.
wp.customize( 'color_theme', value => {
	value.bind( to => {
		document.body.setAttribute( 'data-theme', to );
		document.getElementById('theme-switch').checked = ( 'dark' === to ? true : false );
	} );
} );
