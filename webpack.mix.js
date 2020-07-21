/**
 * Laravel Mix configuration file.
 *
 * Laravel Mix is a layer built on top of WordPress that simplifies much of the
 * complexity of building out a Webpack configuration file. Use this file to
 * configure how your assets are handled in the build process.
 *
 * @link https://laravel.com/docs/5.6/mix
 *
 * @package   Garrick
 * @author    Paul Eiche <paul@boldoak.design>
 * @copyright 2019 Paul Eiche
 * @link      https://boldoak.design/themes/garrick
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */

// Import required packages.
const mix                 = require( 'laravel-mix' );
const ImageminPlugin      = require( 'imagemin-webpack-plugin' ).default;
const CopyPlugin          = require( 'copy-webpack-plugin' );
const imageminMozjpeg     = require( 'imagemin-mozjpeg' );
const SVGSpritemapPlugin  = require( 'svg-spritemap-webpack-plugin' );
const postcssVariables    = require( 'postcss-css-variables' );
const postcssCalc         = require( 'postcss-calc' );

/*
 * -----------------------------------------------------------------------------
 * Theme Export Process
 * -----------------------------------------------------------------------------
 * Configure the export process in `webpack.mix.export.js`. This bit of code
 * should remain at the top of the file here so that it bails early when the
 * `export` command is run.
 * -----------------------------------------------------------------------------
 */

if ( process.env.export ) {
	const exportTheme = require( './webpack.mix.export.js' );
	return;
}

/*
 * -----------------------------------------------------------------------------
 * Build Process
 * -----------------------------------------------------------------------------
 * The section below handles processing, compiling, transpiling, and combining
 * all of the theme's assets into their final location. This is the meat of the
 * build process.
 * -----------------------------------------------------------------------------
 */

/*
 * Sets the development path to assets. By default, this is the `/resources`
 * folder in the theme.
 */
const devPath = 'resources';

/*
 * Sets the path to the generated assets. By default, this is the `/dist` folder
 * in the theme. If doing something custom, make sure to change this everywhere.
 */
mix.setPublicPath( 'dist' );

/*
 * Set Laravel Mix options.
 *
 * @link https://laravel.com/docs/5.6/mix#postcss
 * @link https://laravel.com/docs/5.6/mix#url-processing
 */
mix.options( {
	processCssUrls : false,
} );

/*
 * Builds sources maps for assets.
 *
 * @link https://laravel.com/docs/5.6/mix#css-source-maps
 */
mix.sourceMaps();

/*
 * Versioning and cache busting. Append a unique hash for production assets. If
 * you only want versioned assets in production, do a conditional check for
 * `mix.inProduction()`.
 *
 * @link https://laravel.com/docs/5.6/mix#versioning-and-cache-busting
 */
mix.version();

/*
 * Compile JavaScript.
 *
 * @link https://laravel.com/docs/5.6/mix#working-with-scripts
 */
mix.js( `${devPath}/js/app.js`,                'js' )
   .js( `${devPath}/js/customize-controls.js`, 'js' )
   .js( `${devPath}/js/customize-preview.js`,  'js' );

/*
 * Compile CSS. Mix supports Sass, Less, Stylus, and plain CSS, and has functions
 * for each of them.
 *
 * @link https://laravel.com/docs/5.6/mix#working-with-stylesheets
 * @link https://laravel.com/docs/5.6/mix#sass
 * @link https://github.com/sass/node-sass#options
 */

// Sass configuration.
var sassConfig = {
	sassOptions: {
		outputStyle : 'expanded',
		indentType  : 'tab',
		indentWidth : 1,
		includePaths: [
			'resources/scss',
		],
	},
};

// Compile user-facing styles.
mix.sass( `${devPath}/scss/screen.scss`, 'css', sassConfig );

// Compile fallback CSS replacing custom properties and calc().
// @link https://github.com/JeffreyWay/laravel-mix/issues/2143#issuecomment-524368071
mix.sass( `${devPath}/scss/screen-fallback.scss`, 'css', sassConfig, [
	postcssVariables( {
		preserve: false,
	} ),
	postcssCalc(),
] );

// Compile editor and Customizer styles.
mix.sass( `${devPath}/scss/editor.scss`,    'css', sassConfig )
	 .sass( `${devPath}/scss/customize.scss`, 'css', sassConfig );

/*
 * Add custom Webpack configuration.
 *
 * Laravel Mix doesn't currently minimize images while using its `.copy()`
 * function, so we're using the `CopyWebpackPlugin` for processing and copying
 * images into the distribution folder.
 *
 * @link https://laravel.com/docs/5.6/mix#custom-webpack-configuration
 * @link https://webpack.js.org/configuration/
 */
mix.webpackConfig( {
	stats       : 'minimal',
	devtool     : mix.inProduction() ? false : 'source-map',
	performance : { hints  : false    },
	externals   : { jquery : 'jQuery' },
	resolve     : {
		alias : {
			// Alias for Hybrid Customize assets.
			// Import from `hybrid-customize/js` or `~hybrid-customize/scss`.
			'hybrid-customize' : path.resolve( __dirname, 'vendor/justintadlock/hybrid-customize/resources/' )
		}
	},
	plugins     : [
		// @link https://github.com/webpack-contrib/copy-webpack-plugin
		new CopyPlugin({
			patterns: [
				{
					from : `${devPath}/svg`,
					to   : 'svg',
				},
				{
					from : `node_modules/codyhouse-framework/main/assets/js/util.js`,
					to   : 'js',
				},
			]
		}),
		// @link https://github.com/Klathmon/imagemin-webpack-plugin
		new ImageminPlugin( {
			test     : /\.(jpe?g|png|gif|svg)$/i,
			disable  : process.env.NODE_ENV !== 'production',
			optipng  : { optimizationLevel : 3 },
			gifsicle : { optimizationLevel : 3 },
			pngquant : {
				quality : '65-90',
				speed   : 4
			},
			svgo : {
				plugins : [
					{ cleanupIDs                : false },
					{ removeViewBox             : false },
					{ removeUnknownsAndDefaults : false }
				]
			},
			plugins : [
				// @link https://github.com/imagemin/imagemin-mozjpeg
				imageminMozjpeg( { quality : 75 } ),
			]
		} ),
		// @link https://github.com/cascornelissen/svg-spritemap-webpack-plugin
		new SVGSpritemapPlugin(`${devPath}/svg/*.svg`, {
			output: {
				filename: 'img/icons.svg',
				svg: {
					sizes: false,
				},
				chunk: {
					// mix.version() requires the chunk to exist
					// @link https://github.com/cascornelissen/svg-spritemap-webpack-plugin/issues/88
					keep: true,
				},
			},
			sprite: {
				prefix: 'icon-',
				idify: (filename) => filename.replace(/[\s]+/g, '-'),
				generate: {
					title: false,
				},
			},
		}),
	]
} );

if ( process.env.sync ) {

	/*
	 * Monitor files for changes and inject your changes into the browser.
	 *
	 * @link https://laravel.com/docs/5.6/mix#browsersync-reloading
	 */
	mix.browserSync( {
		proxy : 'localhost',
		files : [
			'dist/**/*',
			`${devPath}/views/**/*.php`,
			'app/**/*.php',
			'functions.php'
		]
	} );
}
