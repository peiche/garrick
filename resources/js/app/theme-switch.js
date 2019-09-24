/* global localStorage */

( function() {

	let darkThemeSelected = ( 'dark' === localStorage.getItem( 'themeSwitch' ) );
	let themeSwitch = document.getElementById( 'theme-switch' );

	function initTheme() {

		if ( null !== localStorage.getItem( 'themeSwitch' ) ) {

			// update checkbox
			themeSwitch.checked = darkThemeSelected;

			// update body data-theme attribute
			darkThemeSelected ? document.body.setAttribute( 'data-theme', 'dark' ) : document.body.setAttribute( 'data-theme', 'default' );
		}
	}

	function resetTheme() {
		if ( themeSwitch.checked ) {

			// dark theme has been selected
			document.body.setAttribute( 'data-theme', 'dark' );

			// save theme selection
			localStorage.setItem( 'themeSwitch', 'dark' );
		} else {
			document.body.setAttribute( 'data-theme', 'default' );

			// reset theme selection
			localStorage.setItem( 'themeSwitch', 'default' );
		}
	}

	if ( themeSwitch ) {
		initTheme();

		// on page load, if user has already selected a specific theme -> apply it
		themeSwitch.addEventListener( 'change', function( event ) {
			resetTheme(); // update color theme
		} );
	}

}() );
