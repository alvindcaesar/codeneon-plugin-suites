<?php
/**
 * Codeneon_Plugin_Suites
 *
 * @package   Codeneon_Plugin_Suites
 * @author    Alvind Caesar <alvind.caesar@gmail.com>
 * @copyright 2020 Codeneon Digital
 * @license   GPL 2.0+
 * @link      https://alvindcaesar.com/
 */

namespace Codeneon_Plugin_Suites\Frontend;

use Codeneon_Plugin_Suites\Engine\Base;

/**
 * Enqueue stuff on the frontend
 */
class Enqueue extends Base {

	/**
	 * Initialize the class.
	 *
	 * @return void|bool
	 */
	public function initialize() {
		parent::initialize();

		// Load public-facing style sheet and JavaScript.
		\add_action( 'wp_enqueue_scripts', array( self::class, 'enqueue_styles' ) );
		\add_action( 'wp_enqueue_scripts', array( self::class, 'enqueue_scripts' ) );
		\add_action( 'wp_enqueue_scripts', array( self::class, 'enqueue_js_vars' ) );
	}


	/**
	 * Register and enqueue public-facing style sheet.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public static function enqueue_styles() {
		\wp_enqueue_style( CPS_TEXTDOMAIN . '-plugin-styles', \plugins_url( 'assets/css/public.css', CPS_PLUGIN_ABSOLUTE ), array(), CPS_VERSION );
	}


	/**
	 * Register and enqueues public-facing JavaScript files.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public static function enqueue_scripts() {
		\wp_enqueue_script( CPS_TEXTDOMAIN . '-plugin-script', \plugins_url( 'assets/js/public.js', CPS_PLUGIN_ABSOLUTE ), array( 'jquery' ), CPS_VERSION, false );
	}


	/**
	 * Print the PHP var in the HTML of the frontend for access by JavaScript.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public static function enqueue_js_vars() {
		\wp_localize_script(
			CPS_TEXTDOMAIN . '-plugin-script',
			'cps_js_vars',
			array(
				'alert' => \__( 'Hey! You have clicked the button!', CPS_TEXTDOMAIN ),
			)
		);
	}


}
