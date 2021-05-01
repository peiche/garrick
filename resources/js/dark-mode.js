( function() {
	// change the HTML data-theme value when the page is loaded (to prevent change of color flash) - the switch behaviour is handled by the _1_theme-switch.js component
	let darkThemeSelected = checkDarkTheme();

	if ( darkThemeSelected ) {
		document.getElementsByTagName( 'html' )[ 0 ].setAttribute( 'data-theme', 'dark' );
	}

	function checkDarkTheme() { // check both localStorage value and prefers-color-scheme setting
		const darkThemestorage = ( localStorage.getItem( 'themeSwitch' ) !== null && localStorage.getItem( 'themeSwitch' ) === 'dark' );
		return darkThemestorage;
	}
}() );
