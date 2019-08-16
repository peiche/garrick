/* global Util */

(function() {

	let mainHeader = document.getElementById( 'app-header' );
	if ( mainHeader ) {
		let trigger = document.getElementById( 'nav-toggle' ),
				nav = document.getElementById('menu--primary');

		if ( trigger && nav ) {

			//detect click on nav trigger
			trigger.addEventListener( 'click', ( event ) => {
				event.preventDefault();
				let ariaExpanded = ! Util.hasClass( nav, 'is-visible' );

				//show nav and update button aria value
				Util.toggleClass( nav, 'is-visible', ariaExpanded );
				trigger.setAttribute( 'aria-expanded', ariaExpanded );
				if ( ariaExpanded ) {

					//opening menu -> move focus to first element inside nav
					nav.querySelectorAll( '[href], input:not([disabled]), button:not([disabled])' )[0].focus();
				}
			} );
		}
	}

}() );
