( function() {

	if ( ! ( 'CSS' in window && CSS.supports('color', 'var(--color-var)') ) ) {
		const css = document.getElementById( 'trunc-screen-css' );
		css.href = css.href.replace( 'screen', 'screen-fallback' );
	}

}() );
