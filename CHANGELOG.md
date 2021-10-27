# Change Log

## 1.5.2 - 10/26/2021

### New

- Added theme.json for universal theme support.
- Added global alignment styles.
- Added legacy embed style.

### Changed

- Updated to CodyFrame 3.0.2.
- Adjusted block styles to match core.
- Fixed site logo height.
- Changed component spacing from `em` to `rem`.
- Fixed post tag location in post archives.

### Removed

- Removed archive listing options from Customizer.
- Dequeued block library theme styles.

## 1.5.1 - 10/11/2021

### Changed

- Changed posts navigation and footer navigation to use CSS gap.

## 1.5.0 - 10/11/2021

### Changed

- Updated to CodyFrame 3.0.0.
- Changed @import statements to support Sass modules.
- Changed Choices.js stylesheet import from Sass to compiled CSS. (This is done to avoid compilation errors, since Choices.js [has not been updated to support Sass modules](https://github.com/Choices-js/Choices/issues/964).)
- Removed fallback stylesheet.
- Removed Post Columns setting. All post archive pages now display 3 columns.
- Updated variables and text sizing units.
- Fixed outer padding on block editor.
- Overhauled buttons and colors [global settings](https://codyhouse.co/ds/globals).
- Updated gallery styles to support CSS gap.

## 1.4.4 - 07/06/2021

### New

- Added setting to allow Jetpack image carousel theme to follow theme's color scheme.

### Changed

- Removed double-specificity Jetpack stylesheet overrides.
- Changed gallery width to 1 on small devices.
- Dequeued Jetpack contact form styles.
- Dequeued Jetpack infinite scroll styles for default themes.
- Added missing styles for Jetpack contact form.
- Fixed miscellaneous block editor style weirdness.

Note that the unused `wp_deregister_style` lines are left commented out for ease of future use or reference.

## 1.4.3 - 06/24/2021

### Changed

- Updated to CodyFrame 2.8.9.
- Fixed buttons block spacing.
- Fixed code block text color and width in the block editor.
- Fixed cover block color overlay.
- Fixed quote block large variant citation alignment.
- Fixed Inset Hero template header for when there is no featured image.

## 1.4.2 - 05/06/2021

### Changed

- Updated to CodyFrame 2.8.8.

## 1.4.1 - 05/03/2021

### Changed

- Added post navigation to all custom templates.
- Fixed excerpt color contrast on Cover template.
- Normalized hero sizes the same across Hero Header and Inset Hero Header templates.
- Fixed Inset Hero Header template's negative margin for small screen sizes.

## 1.4.0 - 04/30/2021

### New

- Added new "Inset Hero Header" page and post template.
- Added new Customizer option for setting a default post and page template.
- Added icon utility class to override SVG stroke property.

### Changed

- Removed padding overrides on media text block.
- Removed icon-specific styles.
- Removed theme support for block templates.
- Changed color theme and heart icons to monochrome.
- Changed color theme JavaScript to prevent screen flash.
- Fixed duplicate screen reader styles.
- Fixed image styles for cover block.

## 1.3.2 - 04/21/2021

### Changed

- Fixed gallery block margins.
- Removed medium screen size breakpoint for align-wide blocks.
- Adjusted caption top margin.

## 1.3.1 - 04/19/2021

### Changed

- Fixed preformatted block text color.
- Tweaked width of left- and right-aligned blocks on large screens.

## 1.3.0 - 04/15/2021

### New

- Added style for spacer block.

### Changed

- Updated to CodyFrame 2.8.7.
- Removed embed block nested style override.
- Fixed search header background color.
- Fixed align-wide blocks being cut off on smaller screen sizes.
- Fixed gallery block margins.

## 1.2.0 - 04/07/2021

### Changed

- Updated to Hybrid Core 5.2.
- Restructured block styles.
- Added sticky post label and icon.
- Added selective refresh for tagline in Customizer.

## 1.1.1 - 03/26/2021

#### Changed

- Fixed transparent text on block editor.

## 1.1.0 - 01/22/2021

### Changed

- Updated to CodyFrame 2.8.6.
- Fixed post and comment author link color.
- Changed button block's default button color.
- Removed column block's margins.
- Added Jetpack contact and subscription form styles.

## 1.0.0 - 04/07/2020

### New

- Initial release.
