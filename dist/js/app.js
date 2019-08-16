/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _app_init__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./app/init */ "./resources/js/app/init.js");
/* harmony import */ var _app_init__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_app_init__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _app_nav__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./app/nav */ "./resources/js/app/nav.js");
/* harmony import */ var _app_nav__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_app_nav__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _app_menuAim__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./app/menuAim */ "./resources/js/app/menuAim.js");
/* harmony import */ var _app_menuAim__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_app_menuAim__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _app_dropdown__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./app/dropdown */ "./resources/js/app/dropdown.js");
/* harmony import */ var _app_dropdown__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_app_dropdown__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _app_search__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./app/search */ "./resources/js/app/search.js");
/* harmony import */ var _app_search__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_app_search__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _app_themeSwitch__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./app/themeSwitch */ "./resources/js/app/themeSwitch.js");
/* harmony import */ var _app_themeSwitch__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_app_themeSwitch__WEBPACK_IMPORTED_MODULE_5__);
/**
 * Primary front-end script.
 *
 * Primary JavaScript file. Any includes or anything imported should
 * be filtered through this file and eventually saved back into the
 * `/dist/js/app.js` file.
 *
 * @package   Trunc
 * @author    Paul Eiche <paul@boldoak.design>
 * @copyright 2018 Paul Eiche
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://boldoak.design/themes/trunc
 */

/**
 * Import scripts.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */







/***/ }),

/***/ "./resources/js/app/dropdown.js":
/*!**************************************!*\
  !*** ./resources/js/app/dropdown.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// File#: _2_dropdown
(function () {
  var Dropdown = function Dropdown(element) {
    this.element = element;
    this.trigger = this.element.getElementsByClassName('menu__link')[0];
    this.dropdown = this.element.getElementsByClassName('menu__sub-menu')[0];
    this.triggerFocus = false;
    this.dropdownFocus = false;
    this.hideInterval = false; // sublevels

    this.dropdownSubElements = this.element.getElementsByClassName('menu__item has-children');
    this.prevFocus = false; // store element that was in focus before focus changed

    this.addDropdownEvents();
  };

  Dropdown.prototype.addDropdownEvents = function () {
    // init dropdown
    this.initElementEvents(this.trigger, this.triggerFocus); // this is used to trigger the primary dropdown

    this.initElementEvents(this.dropdown, this.dropdownFocus); // this is used to trigger the primary dropdown
    // init sublevels

    this.initSublevels(); // if there are additional sublevels -> bind hover/focus events
  };

  Dropdown.prototype.initElementEvents = function (element, bool) {
    var self = this;
    element.addEventListener('mouseenter', function () {
      bool = true;
      self.showDropdown();
    });
    element.addEventListener('focus', function () {
      self.showDropdown();
    });
    element.addEventListener('mouseleave', function () {
      bool = false;
      self.hideDropdown();
    });
    element.addEventListener('focusout', function () {
      self.hideDropdown();
    });
  };

  Dropdown.prototype.showDropdown = function () {
    if (this.hideInterval) {
      clearInterval(this.hideInterval);
    }

    this.showLevel(this.dropdown, true);
  };

  Dropdown.prototype.hideDropdown = function () {
    var self = this;

    if (this.hideInterval) {
      clearInterval(this.hideInterval);
    }

    this.hideInterval = setTimeout(function () {
      var dropDownFocus = document.activeElement.closest('.menu__item.has-children'),
          inFocus = dropDownFocus && dropDownFocus == self.element; // if not in focus and not hover -> hide

      if (!self.triggerFocus && !self.dropdownFocus && !inFocus) {
        self.hideLevel(self.dropdown); // make sure to hide sub/dropdown

        self.hideSubLevels();
        self.prevFocus = false;
      }
    }, 300);
  };

  Dropdown.prototype.initSublevels = function () {
    var self = this;
    var dropdownMenu = this.element.getElementsByClassName('menu__sub-menu');

    for (var i = 0; i < dropdownMenu.length; i++) {
      var listItems = dropdownMenu[i].children; // bind hover

      new menuAim({
        menu: dropdownMenu[i],
        activate: function activate(row) {
          var subList = row.getElementsByClassName('menu__sub-menu')[0];

          if (!subList) {
            return;
          }

          Util.addClass(row.querySelector('a'), 'menu__item--hover');
          self.showLevel(subList);
        },
        deactivate: function deactivate(row) {
          var subList = row.getElementsByClassName('menu__sub-menu')[0];

          if (!subList) {
            return;
          }

          Util.removeClass(row.querySelector('a'), 'menu__item--hover');
          self.hideLevel(subList);
        },
        submenuSelector: '.menu__item has-children'
      });
    } // store focus element before change in focus


    this.element.addEventListener('keydown', function (event) {
      if (event.keyCode && 9 == event.keyCode || event.key && 'Tab' == event.key) {
        self.prevFocus = document.activeElement;
      }
    }); // make sure that sublevel are visible when their items are in focus

    this.element.addEventListener('keyup', function (event) {
      if (event.keyCode && 9 == event.keyCode || event.key && 'Tab' == event.key) {
        // focus has been moved -> make sure the proper classes are added to subnavigation
        var focusElement = document.activeElement,
            focusElementParent = focusElement.closest('.menu__sub-menu'),
            focusElementSibling = focusElement.nextElementSibling; // if item in focus is inside submenu -> make sure it is visible

        if (focusElementParent && !Util.hasClass(focusElementParent, 'menu__sub-menu--is-visible')) {
          self.showLevel(focusElementParent);
        } // if item in focus triggers a submenu -> make sure it is visible


        if (focusElementSibling && !Util.hasClass(focusElementSibling, 'menu__sub-menu--is-visible')) {
          self.showLevel(focusElementSibling);
        } // check previous element in focus -> hide sublevel if required


        if (!self.prevFocus) {
          return;
        }

        var prevFocusElementParent = self.prevFocus.closest('.menu__sub-menu'),
            prevFocusElementSibling = self.prevFocus.nextElementSibling;

        if (!prevFocusElementParent) {
          return;
        } // element in focus and element prev in focus are siblings


        if (focusElementParent && focusElementParent == prevFocusElementParent) {
          if (prevFocusElementSibling) {
            self.hideLevel(prevFocusElementSibling);
          }

          return;
        } // element in focus is inside submenu triggered by element prev in focus


        if (prevFocusElementSibling && focusElementParent && focusElementParent == prevFocusElementSibling) {
          return;
        } // shift tab -> element in focus triggers the submenu of the element prev in focus


        if (focusElementSibling && prevFocusElementParent && focusElementSibling == prevFocusElementParent) {
          return;
        }

        var focusElementParentParent = focusElementParent.parentNode.closest('.menu__sub-menu'); // shift tab -> element in focus is inside the dropdown triggered by a siblings of the element prev in focus

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

  Dropdown.prototype.hideSubLevels = function () {
    var visibleSubLevels = this.dropdown.getElementsByClassName('menu__sub-menu--is-visible');

    if (0 == visibleSubLevels.length) {
      return;
    }

    while (visibleSubLevels[0]) {
      this.hideLevel(visibleSubLevels[0]);
    }

    var hoveredItems = this.dropdown.getElementsByClassName('menu__item--hover');

    while (hoveredItems[0]) {
      Util.removeClass(hoveredItems[0], 'menu__item--hover');
    }
  };

  Dropdown.prototype.showLevel = function (level, bool) {
    if (bool == undefined) {
      //check if the sublevel needs to be open to the left
      Util.removeClass(level, 'menu__sub-menu--left');
      var boundingRect = level.getBoundingClientRect();

      if (5 > window.innerWidth - boundingRect.right && 2 * boundingRect.width < boundingRect.left + window.scrollX) {
        Util.addClass(level, 'menu__sub-menu--left');
      }
    }

    Util.addClass(level, 'menu__sub-menu--is-visible');
    Util.removeClass(level, 'menu__sub-menu--is-hidden');
  };

  Dropdown.prototype.hideLevel = function (level) {
    if (!Util.hasClass(level, 'menu__sub-menu--is-visible')) {
      return;
    }

    Util.removeClass(level, 'menu__sub-menu--is-visible');
    Util.addClass(level, 'menu__sub-menu--is-hidden');
    level.addEventListener('animationend', function cb() {
      level.removeEventListener('animationend', cb);
      Util.removeClass(level, 'menu__sub-menu--is-hidden menu__sub-menu--left');
    });
  };

  var dropdown = document.getElementsByClassName('menu__item has-children');

  if (0 < dropdown.length) {
    // init Dropdown objects
    for (var i = 0; i < dropdown.length; i++) {
      (function (i) {
        new Dropdown(dropdown[i]);
      })(i);
    }
  }
})();

/***/ }),

/***/ "./resources/js/app/init.js":
/*!**********************************!*\
  !*** ./resources/js/app/init.js ***!
  \**********************************/
/*! no static exports found */
/***/ (function(module, exports) {

document.getElementsByTagName('html')[0].className += ' js';

/***/ }),

/***/ "./resources/js/app/menuAim.js":
/*!*************************************!*\
  !*** ./resources/js/app/menuAim.js ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// File#: _1_diagonal-movement

/*
  Modified version of the jQuery-menu-aim plugin
  https://github.com/kamens/jQuery-menu-aim
  - Replaced jQuery with Vanilla JS
  - Minor changes
*/
(function () {
  var menuAim = function menuAim(opts) {
    init(opts);
  };

  window.menuAim = menuAim;

  function init(opts) {
    var activeRow = null,
        mouseLocs = [],
        lastDelayLoc = null,
        timeoutId = null,
        options = Util.extend({
      menu: '',
      rows: false,
      //if false, get direct children - otherwise pass nodes list
      submenuSelector: '*',
      submenuDirection: 'right',
      tolerance: 75,
      // bigger = more forgivey when entering submenu
      enter: function enter() {},
      exit: function exit() {},
      activate: function activate() {},
      deactivate: function deactivate() {},
      exitMenu: function exitMenu() {}
    }, opts),
        menu = options.menu;
    var MOUSE_LOCS_TRACKED = 3,
        // number of past mouse locations to track
    DELAY = 300; // ms delay when user appears to be entering submenu

    /**
     * Keep track of the last few locations of the mouse.
     */

    var mousemoveDocument = function mousemoveDocument(e) {
      mouseLocs.push({
        x: e.pageX,
        y: e.pageY
      });

      if (mouseLocs.length > MOUSE_LOCS_TRACKED) {
        mouseLocs.shift();
      }
    };
    /**
     * Cancel possible row activations when leaving the menu entirely
     */


    var mouseleaveMenu = function mouseleaveMenu() {
      if (timeoutId) {
        clearTimeout(timeoutId);
      } // If exitMenu is supplied and returns true, deactivate the
      // currently active row on menu exit.


      if (options.exitMenu(this)) {
        if (activeRow) {
          options.deactivate(activeRow);
        }

        activeRow = null;
      }
    };
    /**
     * Trigger a possible row activation whenever entering a new row.
     */


    var mouseenterRow = function mouseenterRow() {
      if (timeoutId) {
        // Cancel any previous activation delays
        clearTimeout(timeoutId);
      }

      options.enter(this);
      possiblyActivate(this);
    },
        mouseleaveRow = function mouseleaveRow() {
      options.exit(this);
    };
    /*
     * Immediately activate a row if the user clicks on it.
     */


    var clickRow = function clickRow() {
      activate(this);
    };
    /**
     * Activate a menu row.
     */


    var activate = function activate(row) {
      if (row == activeRow) {
        return;
      }

      if (activeRow) {
        options.deactivate(activeRow);
      }

      options.activate(row);
      activeRow = row;
    };
    /**
     * Possibly activate a menu row. If mouse movement indicates that we
     * shouldn't activate yet because user may be trying to enter
     * a submenu's content, then delay and check again later.
     */


    var possiblyActivate = function possiblyActivate(row) {
      var delay = activationDelay();

      if (delay) {
        timeoutId = setTimeout(function () {
          possiblyActivate(row);
        }, delay);
      } else {
        activate(row);
      }
    };
    /**
     * Return the amount of time that should be used as a delay before the
     * currently hovered row is activated.
     *
     * Returns 0 if the activation should happen immediately. Otherwise,
     * returns the number of milliseconds that should be delayed before
     * checking again to see if the row should be activated.
     */


    var activationDelay = function activationDelay() {
      if (!activeRow || !Util.is(activeRow, options.submenuSelector)) {
        // If there is no other submenu row already active, then
        // go ahead and activate immediately.
        return 0;
      }

      function getOffset(element) {
        var rect = element.getBoundingClientRect();
        return {
          top: rect.top + window.pageYOffset,
          left: rect.left + window.pageXOffset
        };
      }

      ;
      var offset = getOffset(menu),
          upperLeft = {
        x: offset.left,
        y: offset.top - options.tolerance
      },
          upperRight = {
        x: offset.left + menu.offsetWidth,
        y: upperLeft.y
      },
          lowerLeft = {
        x: offset.left,
        y: offset.top + menu.offsetHeight + options.tolerance
      },
          lowerRight = {
        x: offset.left + menu.offsetWidth,
        y: lowerLeft.y
      },
          loc = mouseLocs[mouseLocs.length - 1],
          prevLoc = mouseLocs[0];

      if (!loc) {
        return 0;
      }

      if (!prevLoc) {
        prevLoc = loc;
      }

      if (prevLoc.x < offset.left || prevLoc.x > lowerRight.x || prevLoc.y < offset.top || prevLoc.y > lowerRight.y) {
        // If the previous mouse location was outside of the entire
        // menu's bounds, immediately activate.
        return 0;
      }

      if (lastDelayLoc && loc.x == lastDelayLoc.x && loc.y == lastDelayLoc.y) {
        // If the mouse hasn't moved since the last time we checked
        // for activation status, immediately activate.
        return 0;
      } // Detect if the user is moving towards the currently activated
      // submenu.
      //
      // If the mouse is heading relatively clearly towards
      // the submenu's content, we should wait and give the user more
      // time before activating a new row. If the mouse is heading
      // elsewhere, we can immediately activate a new row.
      //
      // We detect this by calculating the slope formed between the
      // current mouse location and the upper/lower right points of
      // the menu. We do the same for the previous mouse location.
      // If the current mouse location's slopes are
      // increasing/decreasing appropriately compared to the
      // previous's, we know the user is moving toward the submenu.
      //
      // Note that since the y-axis increases as the cursor moves
      // down the screen, we are looking for the slope between the
      // cursor and the upper right corner to decrease over time, not
      // increase (somewhat counterintuitively).


      function slope(a, b) {
        return (b.y - a.y) / (b.x - a.x);
      }

      ;
      var decreasingCorner = upperRight,
          increasingCorner = lowerRight; // Our expectations for decreasing or increasing slope values
      // depends on which direction the submenu opens relative to the
      // main menu. By default, if the menu opens on the right, we
      // expect the slope between the cursor and the upper right
      // corner to decrease over time, as explained above. If the
      // submenu opens in a different direction, we change our slope
      // expectations.

      if ('left' == options.submenuDirection) {
        decreasingCorner = lowerLeft;
        increasingCorner = upperLeft;
      } else if ('below' == options.submenuDirection) {
        decreasingCorner = lowerRight;
        increasingCorner = lowerLeft;
      } else if ('above' == options.submenuDirection) {
        decreasingCorner = upperLeft;
        increasingCorner = upperRight;
      }

      var decreasingSlope = slope(loc, decreasingCorner),
          increasingSlope = slope(loc, increasingCorner),
          prevDecreasingSlope = slope(prevLoc, decreasingCorner),
          prevIncreasingSlope = slope(prevLoc, increasingCorner);

      if (decreasingSlope < prevDecreasingSlope && increasingSlope > prevIncreasingSlope) {
        // Mouse is moving from previous location towards the
        // currently activated submenu. Delay before activating a
        // new menu row, because user may be moving into submenu.
        lastDelayLoc = loc;
        return DELAY;
      }

      lastDelayLoc = null;
      return 0;
    };
    /**
     * Hook up initial menu events
     */


    menu.addEventListener('mouseleave', mouseleaveMenu);
    var rows = options.rows ? options.rows : menu.children;

    if (0 < rows.length) {
      for (var i = 0; i < rows.length; i++) {
        (function (i) {
          rows[i].addEventListener('mouseenter', mouseenterRow);
          rows[i].addEventListener('mouseleave', mouseleaveRow);
          rows[i].addEventListener('click', clickRow);
        })(i);
      }
    }

    document.addEventListener('mousemove', function (event) {
      !window.requestAnimationFrame ? mousemoveDocument(event) : window.requestAnimationFrame(function () {
        mousemoveDocument(event);
      });
    });
  }

  ;
})();

/***/ }),

/***/ "./resources/js/app/nav.js":
/*!*********************************!*\
  !*** ./resources/js/app/nav.js ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

/* global Util */
(function () {
  var mainHeader = document.getElementById('app-header');

  if (mainHeader) {
    var trigger = document.getElementById('nav-toggle'),
        nav = document.getElementById('menu--primary');

    if (trigger && nav) {
      //detect click on nav trigger
      trigger.addEventListener('click', function (event) {
        event.preventDefault();
        var ariaExpanded = !Util.hasClass(nav, 'is-visible'); //show nav and update button aria value

        Util.toggleClass(nav, 'is-visible', ariaExpanded);
        trigger.setAttribute('aria-expanded', ariaExpanded);

        if (ariaExpanded) {
          //opening menu -> move focus to first element inside nav
          nav.querySelectorAll('[href], input:not([disabled]), button:not([disabled])')[0].focus();
        }
      });
    }
  }
})();

/***/ }),

/***/ "./resources/js/app/search.js":
/*!************************************!*\
  !*** ./resources/js/app/search.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function () {
  // Search toggle
  var headerSearch = document.getElementById('app-header__search');

  if (headerSearch) {
    var formControl = headerSearch.getElementsByClassName('form-control');

    if (formControl) {
      var searchShow = document.getElementById('search-show');

      if (searchShow) {
        searchShow.addEventListener('click', function (event) {
          headerSearch.classList.remove('is-hidden');
          formControl[0].focus();
        });
      }

      var searchHide = document.getElementById('search-hide');

      if (searchHide) {
        searchHide.addEventListener('click', function (event) {
          headerSearch.classList.add('is-hidden');
          formControl[0].value = '';
        });
      }

      formControl[0].addEventListener('keydown', function (event) {
        if (event.keyCode && 27 == event.keyCode || event.key && 'Escape' == event.key) {
          headerSearch.classList.add('is-hidden');
          formControl[0].value = '';
          formControl[0].blur();
        }
      });
    }
  }
})();

/***/ }),

/***/ "./resources/js/app/themeSwitch.js":
/*!*****************************************!*\
  !*** ./resources/js/app/themeSwitch.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/* global localStorage */
(function () {
  var darkThemeSelected = 'dark' === localStorage.getItem('themeSwitch');
  var themeSwitch = document.getElementById('theme-switch');

  function initTheme() {
    if (null !== localStorage.getItem('themeSwitch')) {
      // update checkbox
      themeSwitch.checked = darkThemeSelected; // update body data-theme attribute

      darkThemeSelected ? document.body.setAttribute('data-theme', 'dark') : document.body.setAttribute('data-theme', 'default');
    }
  }

  function resetTheme() {
    if (themeSwitch.checked) {
      // dark theme has been selected
      document.body.setAttribute('data-theme', 'dark'); // save theme selection

      localStorage.setItem('themeSwitch', 'dark');
    } else {
      document.body.setAttribute('data-theme', 'default'); // reset theme selection

      localStorage.setItem('themeSwitch', 'default');
    }
  }

  if (themeSwitch) {
    initTheme(); // on page load, if user has already selected a specific theme -> apply it

    themeSwitch.addEventListener('change', function (event) {
      resetTheme(); // update color theme
    });
  }
})();

/***/ }),

/***/ "./resources/scss/customize-controls.scss":
/*!************************************************!*\
  !*** ./resources/scss/customize-controls.scss ***!
  \************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/scss/editor.scss":
/*!************************************!*\
  !*** ./resources/scss/editor.scss ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/scss/screen.scss":
/*!************************************!*\
  !*** ./resources/scss/screen.scss ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!**************************************************************************************************************************************!*\
  !*** multi ./resources/js/app.js ./resources/scss/screen.scss ./resources/scss/editor.scss ./resources/scss/customize-controls.scss ***!
  \**************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! G:\Bitnami\wordpress-5.2.2-2\apps\wordpress\htdocs\wp-content\themes\trunc\resources\js\app.js */"./resources/js/app.js");
__webpack_require__(/*! G:\Bitnami\wordpress-5.2.2-2\apps\wordpress\htdocs\wp-content\themes\trunc\resources\scss\screen.scss */"./resources/scss/screen.scss");
__webpack_require__(/*! G:\Bitnami\wordpress-5.2.2-2\apps\wordpress\htdocs\wp-content\themes\trunc\resources\scss\editor.scss */"./resources/scss/editor.scss");
module.exports = __webpack_require__(/*! G:\Bitnami\wordpress-5.2.2-2\apps\wordpress\htdocs\wp-content\themes\trunc\resources\scss\customize-controls.scss */"./resources/scss/customize-controls.scss");


/***/ })

/******/ });
//# sourceMappingURL=app.js.map