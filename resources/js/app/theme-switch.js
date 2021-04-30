( function() {
	const themeSwitch = document.getElementById( 'theme-switch' );
	if ( themeSwitch ) {
		const htmlElement = document.getElementsByTagName( 'html' )[ 0 ];
		initTheme();

		themeSwitch.addEventListener( 'change', function( event ) {
			resetTheme( event.target );
		} );

		function initTheme() {
			if ( htmlElement.getAttribute( 'data-theme' ) === 'dark' ) {
				themeSwitch.querySelector( 'input[value="dark"]' ).checked = true;
			}
		}

		function resetTheme( target ) {
			if ( target.value === 'dark' && target.checked ) {
				htmlElement.setAttribute( 'data-theme', 'dark' );
				localStorage.setItem( 'themeSwitch', 'dark' );
			} else {
				htmlElement.setAttribute( 'data-theme', 'default' );
				localStorage.setItem( 'themeSwitch', 'default' );
			}
		}
	}
}() );
