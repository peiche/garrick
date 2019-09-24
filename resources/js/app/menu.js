( function() {

	// Menu toggle
	let menu = document.getElementById( 'menu--primary' );
	if ( menu ) {
		let menuToggle = document.getElementById( 'menu-toggle' );
		if ( menuToggle ) {
			menuToggle.addEventListener( 'click', ( event ) => {
				if ( 'true' === menuToggle.getAttribute('aria-expanded')) {
					menuToggle.setAttribute('aria-expanded', 'false');
					menu.classList.remove( 'is-visible' );
				} else {
					menuToggle.setAttribute('aria-expanded', 'true');
					menu.classList.add( 'is-visible' );
				}
			} );
		}
	}

}() );
