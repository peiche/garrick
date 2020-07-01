<?php
/**
 * Customize class.
 *
 * This file shows some basics on how to set up and work with the WordPress
 * Customization API. This is the place to set up all of your theme options for
 * the customizer.
 *
 * @package   Garrick
 * @author    Paul Eiche <paul@boldoak.design>
 * @copyright 2018 Paul Eiche
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://boldoak.design/themes/garrick
 */

namespace Garrick\Customize;

use WP_Customize_Manager;
use Hybrid\Contracts\Bootable;
use function Garrick\asset;

/**
 * Handles setting up everything we need for the customizer.
 *
 * @link   https://developer.wordpress.org/themes/customize-api
 * @since  1.0.0
 * @access public
 */
class Customize implements Bootable {

	/**
	 * Adds actions on the appropriate customize action hooks.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function boot() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', [ $this, 'registerPanels'   ] );
		add_action( 'customize_register', [ $this, 'registerSections' ] );
		add_action( 'customize_register', [ $this, 'registerSettings' ] );
		add_action( 'customize_register', [ $this, 'registerControls' ] );
		add_action( 'customize_register', [ $this, 'registerPartials' ] );

		// Enqueue scripts and styles.
		add_action( 'customize_controls_enqueue_scripts', [ $this, 'controlsEnqueue'] );
		add_action( 'customize_preview_init', [ $this, 'previewEnqueue' ] );
	}

	/**
	 * Callback for registering panels.
	 *
	 * @link   https://developer.wordpress.org/themes/customize-api/customizer-objects/#panels
	 * @since  1.0.0
	 * @access public
	 * @param  WP_Customize_Manager  $manager  Instance of the customize manager.
	 * @return void
	 */
	public function registerPanels( WP_Customize_Manager $manager ) {
	}

	/**
	 * Callback for registering sections.
	 *
	 * @link   https://developer.wordpress.org/themes/customize-api/customizer-objects/#sections
	 * @since  1.0.0
	 * @access public
	 * @param  WP_Customize_Manager  $manager  Instance of the customize manager.
	 * @return void
	 */
	public function registerSections( WP_Customize_Manager $manager ) {

		$manager->add_section( 'header', array(
			'title'    => __( 'Header Settings', 'garrick' ),
			'priority' => 60,
		) );

		$manager->add_section( 'content', array(
			'title'    => __( 'Content Settings', 'garrick' ),
			'priority' => 60,
		) );

		$manager->add_section( 'fonts', array(
			'title'    => __( 'Fonts', 'garrick' ),
			'priority' => 60,
		) );

	}

	/**
	 * Callback for registering settings.
	 *
	 * @link   https://developer.wordpress.org/themes/customize-api/customizer-objects/#settings
	 * @since  1.0.0
	 * @access public
	 * @param  WP_Customize_Manager  $manager  Instance of the customize manager.
	 * @return void
	 */
	public function registerSettings( WP_Customize_Manager $manager ) {

		// Update the `transform` property of core WP settings.
		$settings = [
			$manager->get_setting( 'blogname' ),
			$manager->get_setting( 'header_image' ),
			$manager->get_setting( 'header_image_data' ),
		];

		array_walk( $settings, function( &$setting ) {
			$setting->transport = 'postMessage';
		} );

		// Remove predefined controls.
		$manager->remove_control( 'header_textcolor' );

		// new settings
		$manager->add_setting( 'show_header_search', array(
			'default' => 0,
			'sanitize_callback' => function( $input ) {
				if ( $input == 1 ) :
					return $input;
				else :
					return 0;
				endif;
			},
		) );

		$manager->add_setting( 'show_theme_switch', array(
			'default' => 0,
			'sanitize_callback' => function( $input ) {
				if ( $input == 1 ) :
					return $input;
				else :
					return 0;
				endif;
			},
		) );

		$manager->add_setting( 'color_theme', array(
			'default' => 'default',
			'transport' => 'postMessage',
			'sanitize_callback' => function( $input ) {
				if ( 'dark' == $input ) :
					return $input;
				else :
					return 'default';
				endif;
			},
		) );

		$manager->add_setting( 'primary_color_light', array(
			'default'   => '#2a6df4', // same as default primary color
			'transport' => 'refresh',
		) );

		$manager->add_setting( 'primary_color_dark', array(
			'default'   => '#41b4e1', // same as default primary color
			'transport' => 'refresh',
		) );

		$manager->add_setting( 'archive_show_tags', array(
			'default'   => false,
			'transport' => 'refresh',
		) );

		$manager->add_setting( 'archive_columns', array(
			'default'   => 1,
			'transport' => 'refresh',
		) );

		$manager->add_setting( 'featured_image_aspect_ratio', array(
			'default'   => '',
			'transport' => 'refresh',
		) );

		$manager->add_setting( 'archive_image_placeholder', array(
			'default'   => false,
			'transport' => 'refresh',
		) );

		$manager->add_setting( 'archive_hide_excerpt', array(
			'default'   => false,
			'transport' => 'refresh',
		) );

		$manager->add_setting( 'archive_hide_readmore', array(
			'default'   => false,
			'transport' => 'refresh',
		) );

		$manager->add_setting( 'font_primary', array(
			'default'   => 'sans-serif',
			'transport' => 'refresh',
		) );

		$manager->add_setting( 'font_heading', array(
			'default'   => 'var(--font-primary)',
			'transport' => 'refresh',
		) );

		$manager->add_setting( 'font_mono', array(
			'default'   => 'monospace',
			'transport' => 'refresh',
		) );

		$manager->add_setting( 'font_weight_heading', array(
			'default'   => '700',
			'transport' => 'refresh',
		) );

		$manager->add_setting( 'hide_title_on_mobile', array(
			'default'   => false,
			'transport' => 'refresh',
		) );

	}

	/**
	 * Callback for registering controls.
	 *
	 * @link   https://developer.wordpress.org/themes/customize-api/customizer-objects/#controls
	 * @since  1.0.0
	 * @access public
	 * @param  WP_Customize_Manager  $manager  Instance of the customize manager.
	 * @return void
	 */
	public function registerControls( WP_Customize_Manager $manager ) {

		$manager->add_control( 'hide_title_on_mobile', array(
			'type' => 'checkbox',
			'section' => 'title_tagline',
			'label' => __( 'Hide Title on Mobile', 'garrick' ),
			'description' => __( 'Do not show the title on small screens.', 'garrick' ),
		) );

		$manager->add_control( 'show_header_search', array(
			'type'        => 'checkbox',
			'section'     => 'header',
			'label'       => __( 'Show Search', 'garrick' ),
			'description' => __( 'Show the search button in the header.', 'garrick' ),
		) );

		$manager->add_control( 'color_theme', array(
			'type'        => 'radio',
			'section'     => 'colors',
			'label'       => __( 'Default Color Theme', 'garrick' ),
			'description' => __( 'Please note that color themes will only work in modern browsers.', 'garrick' ),
			'choices'     => array(
				'default' => __( 'Light', 'garrick' ),
				'dark'    => __( 'Dark', 'garrick' ),
			),
		) );

		$manager->add_control( 'show_theme_switch', array(
			'type' => 'checkbox',
			'section' => 'colors',
			'label' => __( 'Show Theme Toggle', 'garrick' ),
			'description' => __( 'Allow users to switch between light and dark themes.', 'garrick' ),
		) );

		$manager->add_control(
			new \WP_Customize_Color_Control(
			$manager,
			'primary_color_light',
			array(
				'label'       => __( 'Primary Color (Light)', 'garrick' ),
				'description' => __( 'Used in links and buttons.', 'garrick' ),
				'section'     => 'colors',
				'settings'    => 'primary_color_light',
			) )
		);

		$manager->add_control(
			new \WP_Customize_Color_Control(
			$manager,
			'primary_color_dark',
			array(
				'label'       => __( 'Primary Color (Dark)', 'garrick' ),
				'description' => __( 'Used in links and buttons.', 'garrick' ),
				'section'     => 'colors',
				'settings'    => 'primary_color_dark',
			) )
		);

		$manager->add_control( 'archive_columns', array(
			'type'        => 'select',
			'section'     => 'content',
			'label'       => __( 'Post Columns', 'garrick' ),
			'description' => __( 'Show posts and pages in a single column or grid.', 'garrick' ),
			'choices'     => array(
				'1' => 1,
				'2' => 2,
				'3' => 3,
				'4' => 4,
			),
		) );

		$manager->add_control( 'featured_image_aspect_ratio', array(
			'type'        => 'select',
			'section'     => 'content',
			'label'       => __( 'Featured Image Options', 'garrick' ),
			'description' => __( 'Customize how featured images are displayed.', 'garrick' ),
			'choices'     => array(
				''                                  => 'Natural Size',
				'media-wrapper media-wrapper--21:9' => 'Landscape (21:9)',
				'media-wrapper media-wrapper--16:9' => 'Landscape (16:9)',
				'media-wrapper media-wrapper--4:3'  => 'Landscape (4:3)',
				'media-wrapper media-wrapper--1:1'  => 'Square (1:1)',
			),
		) );

		$manager->add_control( 'archive_image_placeholder', array(
			'type'        => 'checkbox',
			'section'     => 'content',
			'label'       => __( 'Image placeholder', 'garrick' ),
			'description' => __( 'Show default fallback image if no featured image is available.', 'garrick' ),
		) );

		$manager->add_control( 'archive_hide_excerpt', array(
			'type'        => 'checkbox',
			'section'     => 'content',
			'label'       => __( 'Hide excerpt', 'garrick' ),
			'description' => __( 'Do not show the post excerpt.', 'garrick' ),
		) );

		$manager->add_control( 'archive_hide_readmore', array(
			'type'        => 'checkbox',
			'section'     => 'content',
			'label'       => __( 'Hide Read More', 'garrick' ),
			'description' => __( 'Do not show the Read More link.', 'garrick' ),
		) );

		$manager->add_control( 'archive_show_tags', array(
			'type'        => 'checkbox',
			'section'     => 'content',
			'label'       => __( 'Show tags', 'garrick' ),
			'description' => __( 'Show tags on blog and archive pages.', 'garrick' ),
		) );

		$fonts_body = json_decode( file_get_contents( get_theme_file_path( 'app/Customize/fonts-body.json' ) ), true );
		$font_body_choices = array();

		foreach( $fonts_body as $key => $value ) {
			$font_body_choices[$value['stack'] . '|' . $value['google']] = $key;
		}

		$fonts_heading = json_decode( file_get_contents( get_theme_file_path( 'app/Customize/fonts-heading.json' ) ), true );
		$font_heading_choices = array();

		foreach( $fonts_heading as $key => $value ) {
			$font_heading_choices[$value['stack'] . '|' . $value['google']] = $key;
		}

		$fonts_mono = json_decode( file_get_contents( get_theme_file_path( 'app/Customize/fonts-mono.json' ) ), true );
		$font_mono_choices = array();

		foreach( $fonts_mono as $key => $value ) {
			$font_mono_choices[$value['stack'] . '|' . $value['google']] = $key;
		}

		$manager->add_control( 'font_primary', array(
			'type'        => 'select',
			'section'     => 'fonts',
			'label'       => __( 'Body Font', 'garrick' ),
			'description' => __( 'Font used for most of the text on the site.', 'garrick' ),
			'choices'     => $font_body_choices,
		) );

		$manager->add_control( 'font_heading', array(
			'type'        => 'select',
			'section'     => 'fonts',
			'label'       => __( 'Heading Font', 'garrick' ),
			'description' => __( 'Font used for titles and headings.', 'garrick' ),
			'choices'     => $font_heading_choices,
		) );

		$manager->add_control( 'font_weight_heading', array(
			'type'        => 'select',
			'section'     => 'fonts',
			'label'       => __( 'Heading Font Weight', 'garrick' ),
			'description' => __( 'Custom font weight for headings.', 'garrick' ),
			'choices' => array(
				'700' => 'Bold',
				'400' => 'Normal',
			),
		) );

		$manager->add_control( 'font_mono', array(
			'type'        => 'select',
			'section'     => 'fonts',
			'label'       => __( 'Monospace Font', 'garrick' ),
			'description' => __( 'Font used for code and preformatted text.', 'garrick' ),
			'choices'     => $font_mono_choices,
		) );
	}

	/**
	 * Callback for registering partials.
	 *
	 * @link   https://developer.wordpress.org/themes/customize-api/tools-for-improved-user-experience/#selective-refresh-fast-accurate-updates
	 * @since  1.0.0
	 * @access public
	 * @param  WP_Customize_Manager  $manager  Instance of the customize manager.
	 * @return void
	 */
	public function registerPartials( WP_Customize_Manager $manager ) {

		// If the selective refresh component is not available, bail.
		if ( ! isset( $manager->selective_refresh ) ) {
			return;
		}

		// Selectively refreshes the title in the header when the core
		// WP `blogname` setting changes.
		$manager->selective_refresh->add_partial( 'blogname', [
			'selector'        => '.app-header__title-link',
			'render_callback' => function() {
				return get_bloginfo( 'name', 'display' );
			}
		] );

		// Selectively refreshes the custom header if it doesn't support
		// videos. Core WP won't properly refresh output from its own
		// `the_custom_header_markup()` function unless video is supported.
		if ( ! current_theme_supports( 'custom-header', 'video' ) ) {

			$manager->selective_refresh->add_partial( 'header_image', [
				'selector'            => '#wp-custom-header',
				'render_callback'     => 'the_custom_header_markup',
				'container_inclusive' => true,
			] );
		}

	}

	/**
	 * Register or enqueue scripts/styles for the controls that are output
	 * in the controls frame.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function controlsEnqueue() {

		wp_enqueue_script(
			'garrick-customize-controls',
			asset( 'js/customize-controls.js' ),
			[ 'customize-controls' ],
			null,
			true
		);

		wp_enqueue_style(
			'garrick-customize',
			asset( 'css/customize.css' ),
			[],
			null
		);
	}

	/**
	 * Register or enqueue scripts/styles for the live preview frame.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function previewEnqueue() {

		wp_enqueue_script(
			'garrick-customize-preview',
			asset( 'js/customize-preview.js' ),
			[ 'customize-preview' ],
			null,
			true
		);
	}
}
