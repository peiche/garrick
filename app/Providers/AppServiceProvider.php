<?php
/**
 * App service provider.
 *
 * Service providers are essentially the bootstrapping code for your theme.
 * They allow you to add bindings to the container on registration and boot them
 * once everything has been registered.
 *
 * @package   Trunc
 * @author    Paul Eiche <paul@boldoak.design>
 * @copyright 2018 Paul Eiche
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://boldoak.design/themes/trunc
 */

namespace Trunc\Providers;

use Hybrid\Tools\ServiceProvider;
use Trunc\Customize\Customize;

/**
 * App service provider.
 *
 * @since  1.0.0
 * @access public
 */
class AppServiceProvider extends ServiceProvider {

	/**
	 * Callback executed when the `\Hybrid\Core\Application` class registers
	 * providers. Use this method to bind items to the container.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function register() {

		// Bind a single instance of our customizer class.
		$this->app->singleton( Customize::class );

		// Bind the Laravel Mix manifest for cache-busting.
		$this->app->singleton( 'trunc/mix', function() {

			$file = get_theme_file_path( 'dist/mix-manifest.json' );

			return file_exists( $file ) ? json_decode( file_get_contents( $file ), true ) : null;
		} );
	}

	/**
	 * Callback executed after all the service providers have been registered.
	 * This is particularly useful for single-instance container objects that
	 * only need to be loaded once per page and need to be resolved early.
	 *
	 * @since  5.0.0
	 * @access public
	 * @return void
	 */
	public function boot() {

		// Boot the customizer class instance.
		$this->app->resolve( Customize::class )->boot();
	}
}
