<?php
/**
 * Customize class.
 *
 * This file shows some basics on how to set up and work with the WordPress
 * Customization API. This is the place to set up all of your theme options for
 * the customizer.
 *
 * @package   Trunc
 * @author    Paul Eiche <paul@boldoak.design>
 * @copyright 2018 Paul Eiche
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://boldoak.design/themes/trunc
 */

namespace Trunc\Customize;

use WP_Customize_Manager;
use Hybrid\Contracts\Bootable;
// use \Hybrid\Customize\Controls;
use function Trunc\asset;

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
			'title' => __( 'Header Settings', 'trunc' ),
			'priority' => 60,
		) );

		$manager->add_section( 'content', array(
			'title' => __( 'Content Settings', 'trunc' ),
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

		$manager->add_setting( 'primary_color_light' , array(
		    'default'   => '#2a6df4', // same as default primary color
		    'transport' => 'refresh',
		) );

		$manager->add_setting( 'primary_color_dark' , array(
		    'default'   => '#41b4e1', // same as default primary color
		    'transport' => 'refresh',
		) );

		$manager->add_setting( 'header_color' , array(
		    'default'   => '',
		    'transport' => 'refresh',
		) );

		$manager->add_setting( 'footer_color' , array(
		    'default'   => '',
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

		$manager->add_control( 'show_header_search', array(
			'type'        => 'checkbox',
			'section'     => 'header',
			'label'       => __( 'Show Search', 'trunc' ),
			'description' => __( 'Display the search overlay button in the header. The overlay also contains a widget area.', 'trunc' ),
		) );

		$manager->add_control( 'color_theme', array(
			'type'        => 'radio',
			'section'     => 'colors',
			'label'       => __( 'Default Color Theme', 'trunc' ),
			'description' => __( 'Please note that color themes will only work in modern browsers.', 'trunc' ),
			'choices'     => array(
				'default' => __( 'Light', 'trunc' ),
				'dark'    => __( 'Dark', 'trunc' ),
			),
		) );

		$manager->add_control( 'show_theme_switch', array(
			'type' => 'checkbox',
			'section' => 'colors',
			'label' => __( 'Show Theme Toggle', 'trunc' ),
			'description' => __( 'Allow users to switch between light and dark themes.', 'trunc' ),
		) );

		$manager->add_control(
			new \WP_Customize_Color_Control(
			$manager,
			'primary_color_light',
			array(
				'label'       => __( 'Primary Color (Light)', 'trunc' ),
				'description' => __( 'Used in links and buttons.', 'trunc' ),
				'section'     => 'colors',
				'settings'    => 'primary_color_light',
			) )
		);

		$manager->add_control(
			new \WP_Customize_Color_Control(
			$manager,
			'primary_color_dark',
			array(
				'label'       => __( 'Primary Color (Dark)', 'trunc' ),
				'description' => __( 'Used in links and buttons.', 'trunc' ),
				'section'     => 'colors',
				'settings'    => 'primary_color_dark',
			) )
		);

		$manager->add_control(
			new \WP_Customize_Color_Control(
			$manager,
			'header_color',
			array(
				'label'       => __( 'Header Background Color', 'trunc' ),
				'description' => __( 'Overrides the theme color.', 'trunc' ),
				'section'     => 'colors',
				'settings'    => 'header_color',
			) )
		);

		$manager->add_control(
			new \WP_Customize_Color_Control(
			$manager,
			'footer_color',
			array(
				'label'       => __( 'Footer Background Color', 'trunc' ),
				'description' => __( 'Overrides the theme color.', 'trunc' ),
				'section'     => 'colors',
				'settings'    => 'footer_color',
			) )
		);
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
			'trunc-customize-controls',
			asset( 'js/customize-controls.js' ),
			[ 'customize-controls' ],
			null,
			true
		);

		wp_enqueue_style(
			'trunc-customize-controls',
			asset( 'css/customize-controls.css' ),
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
			'trunc-customize-preview',
			asset( 'js/customize-preview.js' ),
			[ 'customize-preview' ],
			null,
			true
		);
	}
}
