/**
 * Custom header preview.
 *
 * This file handles the JavaScript for the live preview of the `custom-header`
 * feature in the customizer.
 *
 * @author    Paul Eiche <paul@boldoak.design>
 * @copyright 2018 Paul Eiche
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */

/* global wp */

// Site title.
wp.customize( 'blogname', value => {
	value.bind( to => {
		document.querySelector( '.app-header__title-link' ).textContent = to;
	} );
} );

// Site tagline.
wp.customize( 'blogdescription', value => {
	value.bind( to => {
		document.querySelector( '.app-header__description' ).textContent = to;
	} );
} );
