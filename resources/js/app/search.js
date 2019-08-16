( function() {

	// Search toggle
	let headerSearch = document.getElementById( 'app-header__search' );
	if ( headerSearch ) {
		let formControl = headerSearch.getElementsByClassName( 'form-control' );
		if ( formControl ) {

			let searchShow = document.getElementById( 'search-show' );
			if ( searchShow ) {
				searchShow.addEventListener( 'click', ( event ) => {
					headerSearch.classList.remove( 'is-hidden' );
					formControl[0].focus();
				} );
			}

			let searchHide = document.getElementById( 'search-hide' );
			if ( searchHide) {
				searchHide.addEventListener( 'click', ( event ) => {
					headerSearch.classList.add( 'is-hidden' );
					formControl[0].value = '';
				} );
			}

			formControl[0].addEventListener( 'keydown', ( event ) => {
				if ( event.keyCode && 27 == event.keyCode || event.key && 'Escape' == event.key ) {
					headerSearch.classList.add( 'is-hidden' );
					formControl[0].value = '';
					formControl[0].blur();
				}
			} );

		}
	}

}() );
