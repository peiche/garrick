// File#: _2_dropdown
(function() {
	let Dropdown = function(element) {
		this.element = element;
		this.trigger = this.element.getElementsByClassName('menu__link')[0];
		this.dropdown = this.element.getElementsByClassName('menu__sub-menu')[0];
		this.triggerFocus = false;
		this.dropdownFocus = false;
		this.hideInterval = false;

		// sublevels
		this.dropdownSubElements = this.element.getElementsByClassName('menu__item has-children');
		this.prevFocus = false; // store element that was in focus before focus changed
		this.addDropdownEvents();
	};

	Dropdown.prototype.addDropdownEvents = function() {

		// init dropdown
		this.initElementEvents(this.trigger, this.triggerFocus); // this is used to trigger the primary dropdown
		this.initElementEvents(this.dropdown, this.dropdownFocus); // this is used to trigger the primary dropdown

		// init sublevels
		this.initSublevels(); // if there are additional sublevels -> bind hover/focus events
	};

	Dropdown.prototype.initElementEvents = function(element, bool) {
		let self = this;
		element.addEventListener('mouseenter', function() {
			bool = true;
			self.showDropdown();
		});
		element.addEventListener('focus', function() {
			self.showDropdown();
		});
		element.addEventListener('mouseleave', function() {
			bool = false;
			self.hideDropdown();
		});
		element.addEventListener('focusout', function() {
			self.hideDropdown();
		});
	};

	Dropdown.prototype.showDropdown = function() {
		if (this.hideInterval) {
			clearInterval(this.hideInterval);
		}
		this.showLevel(this.dropdown, true);
	};

	Dropdown.prototype.hideDropdown = function() {
		let self = this;
		if (this.hideInterval) {
			clearInterval(this.hideInterval);
		}
		this.hideInterval = setTimeout(function() {
			let dropDownFocus = document.activeElement.closest('.menu__item.has-children'),
				inFocus = dropDownFocus && (dropDownFocus == self.element);

				// if not in focus and not hover -> hide
			if (! self.triggerFocus && ! self.dropdownFocus && ! inFocus) {
				self.hideLevel(self.dropdown);

				// make sure to hide sub/dropdown
				self.hideSubLevels();
				self.prevFocus = false;
			}
		}, 300);
	};

	Dropdown.prototype.initSublevels = function() {
		let self = this;
		let dropdownMenu = this.element.getElementsByClassName('menu__sub-menu');
		for (let i = 0; i < dropdownMenu.length; i++) {
			let listItems = dropdownMenu[i].children;

			// bind hover
			new menuAim({
				menu: dropdownMenu[i],
				activate: function(row) {
					let subList = row.getElementsByClassName('menu__sub-menu')[0];
					if (! subList) {
						return;
					}
					Util.addClass(row.querySelector('a'), 'menu__item--hover');
					self.showLevel(subList);
				},
				deactivate: function(row) {
					let subList = row.getElementsByClassName('menu__sub-menu')[0];
					if (! subList) {
						return;
					}
					Util.removeClass(row.querySelector('a'), 'menu__item--hover');
					self.hideLevel(subList);
				},
				submenuSelector: '.menu__item has-children'
			});
		}

		// store focus element before change in focus
		this.element.addEventListener('keydown', function(event) {
			if ( event.keyCode && 9 == event.keyCode || event.key && 'Tab' == event.key ) {
				self.prevFocus = document.activeElement;
			}
		});

		// make sure that sublevel are visible when their items are in focus
		this.element.addEventListener('keyup', function(event) {
			if ( event.keyCode && 9 == event.keyCode || event.key && 'Tab' == event.key ) {

				// focus has been moved -> make sure the proper classes are added to subnavigation
				let focusElement = document.activeElement,
					focusElementParent = focusElement.closest('.menu__sub-menu'),
					focusElementSibling = focusElement.nextElementSibling;

				// if item in focus is inside submenu -> make sure it is visible
				if (focusElementParent && ! Util.hasClass(focusElementParent, 'menu__sub-menu--is-visible')) {
					self.showLevel(focusElementParent);
				}

				// if item in focus triggers a submenu -> make sure it is visible
				if (focusElementSibling && ! Util.hasClass(focusElementSibling, 'menu__sub-menu--is-visible')) {
					self.showLevel(focusElementSibling);
				}

				// check previous element in focus -> hide sublevel if required
				if ( ! self.prevFocus) {
					return;
				}
				let prevFocusElementParent = self.prevFocus.closest('.menu__sub-menu'),
					prevFocusElementSibling = self.prevFocus.nextElementSibling;

				if ( ! prevFocusElementParent ) {
					return;
				}

				// element in focus and element prev in focus are siblings
				if ( focusElementParent && focusElementParent == prevFocusElementParent) {
					if (prevFocusElementSibling) {
						self.hideLevel(prevFocusElementSibling);
					}
					return;
				}

				// element in focus is inside submenu triggered by element prev in focus
				if ( prevFocusElementSibling && focusElementParent && focusElementParent == prevFocusElementSibling) {
					return;
				}

				// shift tab -> element in focus triggers the submenu of the element prev in focus
				if ( focusElementSibling && prevFocusElementParent && focusElementSibling == prevFocusElementParent) {
					return;
				}

				let focusElementParentParent = focusElementParent.parentNode.closest('.menu__sub-menu');

				// shift tab -> element in focus is inside the dropdown triggered by a siblings of the element prev in focus
				if (focusElementParentParent && focusElementParentParent == prevFocusElementParent) {
					if (prevFocusElementSibling) {
						self.hideLevel(prevFocusElementSibling);
					}
					return;
				}

				if (prevFocusElementParent && Util.hasClass(prevFocusElementParent, 'menu__sub-menu--is-visible')) {
					self.hideLevel(prevFocusElementParent);
				}
			}
		});
	};

	Dropdown.prototype.hideSubLevels = function() {
		let visibleSubLevels = this.dropdown.getElementsByClassName('menu__sub-menu--is-visible');
		if (0 == visibleSubLevels.length) {
			return;
		}
		while (visibleSubLevels[0]) {
			this.hideLevel(visibleSubLevels[0]);
		}
		let hoveredItems = this.dropdown.getElementsByClassName('menu__item--hover');
		while (hoveredItems[0]) {
			Util.removeClass(hoveredItems[0], 'menu__item--hover');
		}
	};

	Dropdown.prototype.showLevel = function(level, bool) {
		if (bool == undefined) {

			//check if the sublevel needs to be open to the left
			Util.removeClass(level, 'menu__sub-menu--left');
			let boundingRect = level.getBoundingClientRect();
			if (5 > window.innerWidth - boundingRect.right && 2 * boundingRect.width < boundingRect.left + window.scrollX ) {
				Util.addClass(level, 'menu__sub-menu--left');
			}
		}
		Util.addClass(level, 'menu__sub-menu--is-visible');
		Util.removeClass(level, 'menu__sub-menu--is-hidden');
	};

	Dropdown.prototype.hideLevel = function(level) {
		if (! Util.hasClass(level, 'menu__sub-menu--is-visible')) {
			return;
		}
		Util.removeClass(level, 'menu__sub-menu--is-visible');
		Util.addClass(level, 'menu__sub-menu--is-hidden');

		level.addEventListener('animationend', function cb() {
			level.removeEventListener('animationend', cb);
			Util.removeClass(level, 'menu__sub-menu--is-hidden menu__sub-menu--left');
		});
	};


	let dropdown = document.getElementsByClassName('menu__item has-children');
	if ( 0 < dropdown.length ) { // init Dropdown objects
		for ( let i = 0; i < dropdown.length; i++) {
			(function(i) {
				new Dropdown(dropdown[i]);
			})(i);
		}
	}
}());
