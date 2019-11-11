/**
 * Customize controls script.
 *
 * This file handles the JavaScript for the controls panel in the customizer.
 * Any includes or imports should be handled in this file. The final result gets
 * saved back into `dist/js/customize-controls.js`.
 *
 * @package   Garrick
 * @author    Paul Eiche <paul@boldoak.design>
 * @copyright 2018 Paul Eiche
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://boldoak.design/themes/garrick
 */

// Hybrid Customize controls.
//
// Uncomment any of the below to import scripts for specific controls if using
// the `hybrid-customize` add-on.

import checkboxMultiple from 'hybrid-customize/js/controls/checkbox-multiple.js';
import palette          from 'hybrid-customize/js/controls/palette.js';
import radioImage       from 'hybrid-customize/js/controls/radio-image.js';
import selectGroup      from 'hybrid-customize/js/controls/select-group.js';
import selectMultiple   from 'hybrid-customize/js/controls/select-multiple.js';
import Choices          from 'choices.js/src/scripts/choices.js';

wp.customize.bind( 'ready', () => {

	new Choices( '#_customize-input-font_primary, #_customize-input-font_heading' );

} );
