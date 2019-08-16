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
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/customize-controls.js":
/*!********************************************!*\
  !*** ./resources/js/customize-controls.js ***!
  \********************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var hybrid_customize_js_controls_checkbox_multiple_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! hybrid-customize/js/controls/checkbox-multiple.js */ "./vendor/justintadlock/hybrid-customize/resources/js/controls/checkbox-multiple.js");
/* harmony import */ var hybrid_customize_js_controls_checkbox_multiple_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(hybrid_customize_js_controls_checkbox_multiple_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var hybrid_customize_js_controls_palette_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! hybrid-customize/js/controls/palette.js */ "./vendor/justintadlock/hybrid-customize/resources/js/controls/palette.js");
/* harmony import */ var hybrid_customize_js_controls_palette_js__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(hybrid_customize_js_controls_palette_js__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var hybrid_customize_js_controls_radio_image_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! hybrid-customize/js/controls/radio-image.js */ "./vendor/justintadlock/hybrid-customize/resources/js/controls/radio-image.js");
/* harmony import */ var hybrid_customize_js_controls_radio_image_js__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(hybrid_customize_js_controls_radio_image_js__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var hybrid_customize_js_controls_select_group_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! hybrid-customize/js/controls/select-group.js */ "./vendor/justintadlock/hybrid-customize/resources/js/controls/select-group.js");
/* harmony import */ var hybrid_customize_js_controls_select_group_js__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(hybrid_customize_js_controls_select_group_js__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var hybrid_customize_js_controls_select_multiple_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! hybrid-customize/js/controls/select-multiple.js */ "./vendor/justintadlock/hybrid-customize/resources/js/controls/select-multiple.js");
/* harmony import */ var hybrid_customize_js_controls_select_multiple_js__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(hybrid_customize_js_controls_select_multiple_js__WEBPACK_IMPORTED_MODULE_4__);
/**
 * Customize controls script.
 *
 * This file handles the JavaScript for the controls panel in the customizer.
 * Any includes or imports should be handled in this file. The final result gets
 * saved back into `dist/js/customize-controls.js`.
 *
 * @package   Trunc
 * @author    Paul Eiche <paul@boldoak.design>
 * @copyright 2018 Paul Eiche
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://boldoak.design/themes/trunc
 */
// Hybrid Customize controls.
//
// Uncomment any of the below to import scripts for specific controls if using
// the `hybrid-customize` add-on.






/***/ }),

/***/ "./vendor/justintadlock/hybrid-customize/resources/js/controls/checkbox-multiple.js":
/*!******************************************************************************************!*\
  !*** ./vendor/justintadlock/hybrid-customize/resources/js/controls/checkbox-multiple.js ***!
  \******************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Checkbox multiple customize control script.
 *
 * This script is required for the `Hybrid\Customize\Controls\CheckboxMultiple`
 * customize control to work.
 *
 * @package   HybridCustomize
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2018, Justin Tadlock
 * @link      https://github.com/justintadlock/hybrid-customize
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */
wp.customize.controlConstructor['hybrid-checkbox-multiple'] = wp.customize.Control.extend({
  ready: function ready() {
    var control = this;
    var checkboxes = document.querySelectorAll(control.selector + ' input[type="checkbox"]'); // Loops through all of the control's checkboxes and adds an
    // onchange event to update the setting whenever the checkbox
    // checked state changes.

    for (var i = 0; i < checkboxes.length; i++) {
      checkboxes[i].onchange = function (event) {
        var checked = []; // Loop through the checkboxes and add any
        // that are checked to our array.

        for (var i = 0; i < checkboxes.length; i++) {
          if (checkboxes[i].checked) {
            checked.push(checkboxes[i].value);
          }
        } // Set the value for the control based on
        // the checkboxes that are checked.


        control.setting.set(checked ? checked : '');
      };
    }
  }
});

/***/ }),

/***/ "./vendor/justintadlock/hybrid-customize/resources/js/controls/palette.js":
/*!********************************************************************************!*\
  !*** ./vendor/justintadlock/hybrid-customize/resources/js/controls/palette.js ***!
  \********************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Palette customize control script.
 *
 * This script is required for the `Hybrid\Customize\Controls\Palette` customize
 * control to work.
 *
 * @package   HybridCustomize
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2018, Justin Tadlock
 * @link      https://github.com/justintadlock/hybrid-customize
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */
wp.customize.controlConstructor['hybrid-palette'] = wp.customize.Control.extend({
  ready: function ready() {
    var control = this;
    var inputs = document.querySelectorAll(control.selector + ' input[type="radio"]'); // Loops through the radio inputs. If the input is checked, add
    // the `.selected` class to the parent `<label>` element.

    for (var i = 0; i < inputs.length; i++) {
      if (inputs[i].checked) {
        inputs[i].parentNode.classList.add('is-selected');
      }

      inputs[i].onchange = function () {
        for (var i = 0; i < inputs.length; i++) {
          if (inputs[i].parentNode.classList.contains('is-selected')) {
            inputs[i].parentNode.classList.remove('is-selected');
          }
        }

        if (this.checked) {
          this.parentNode.classList.add('is-selected');
        }

        control.setting.set(this.value);
      };
    }
  }
});

/***/ }),

/***/ "./vendor/justintadlock/hybrid-customize/resources/js/controls/radio-image.js":
/*!************************************************************************************!*\
  !*** ./vendor/justintadlock/hybrid-customize/resources/js/controls/radio-image.js ***!
  \************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Radio image customize control script.
 *
 * This script is required for the `Hybrid\Customize\Controls\RadioImage`
 * customize control to work.
 *
 * @package   HybridCustomize
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2018, Justin Tadlock
 * @link      https://github.com/justintadlock/hybrid-customize
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */
wp.customize.controlConstructor['hybrid-radio-image'] = wp.customize.Control.extend({
  ready: function ready() {
    var control = this;
    var inputs = document.querySelectorAll(control.selector + ' input[type="radio"]');

    for (var i = 0; i < inputs.length; i++) {
      inputs[i].onchange = function () {
        control.setting.set(this.value);
      };
    }
  }
});

/***/ }),

/***/ "./vendor/justintadlock/hybrid-customize/resources/js/controls/select-group.js":
/*!*************************************************************************************!*\
  !*** ./vendor/justintadlock/hybrid-customize/resources/js/controls/select-group.js ***!
  \*************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Select group customize control script.
 *
 * This script is required for the `Hybrid\Customize\Controls\SelectGroup`
 * customize control to work.
 *
 * @package   HybridCustomize
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2018, Justin Tadlock
 * @link      https://github.com/justintadlock/hybrid-customize
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */
wp.customize.controlConstructor['hybrid-select-group'] = wp.customize.Control.extend({
  ready: function ready() {
    var control = this;
    var select = document.querySelector(control.selector + ' select');

    select.onchange = function () {
      control.setting.set(this.value);
    };
  }
});

/***/ }),

/***/ "./vendor/justintadlock/hybrid-customize/resources/js/controls/select-multiple.js":
/*!****************************************************************************************!*\
  !*** ./vendor/justintadlock/hybrid-customize/resources/js/controls/select-multiple.js ***!
  \****************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Select multiple customize control script.
 *
 * This script is required for the `Hybrid\Customize\Controls\SelectMultiple`
 * customize control to work.
 *
 * @package   HybridCustomize
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2018, Justin Tadlock
 * @link      https://github.com/justintadlock/hybrid-customize
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */
wp.customize.controlConstructor['hybrid-select-multiple'] = wp.customize.Control.extend({
  ready: function ready() {
    var control = this;
    var select = document.querySelector(control.selector + ' select');
    var options = select.options;

    select.onchange = function () {
      var values = [];

      for (var i = 0; i < options.length; i++) {
        if (options[i].selected) {
          values.push(options[i].value);
        }
      }

      control.setting.set(values ? values : '');
    };
  }
});

/***/ }),

/***/ 1:
/*!**************************************************!*\
  !*** multi ./resources/js/customize-controls.js ***!
  \**************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! G:\Bitnami\wordpress-5.2.2-2\apps\wordpress\htdocs\wp-content\themes\trunc\resources\js\customize-controls.js */"./resources/js/customize-controls.js");


/***/ })

/******/ });
//# sourceMappingURL=customize-controls.js.map