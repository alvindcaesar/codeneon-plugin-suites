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

namespace Codeneon_Plugin_Suites\Backend;

use Codeneon_Plugin_Suites\Engine\Base;

/**
 * This class contain the Enqueue stuff for the backend
 */
class Enqueue extends Base {

	/**
	 * Initialize the class.
	 *
	 * @return void|bool
	 */
	public function initialize() {
		if ( !parent::initialize() ) {
			return;
		}

		// Load admin style sheet and JavaScript.
		\add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_styles' ) );
		\add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_scripts' ) );
	}


	/**
	 * Register and enqueue admin-specific style sheet.
	 *
	 * @since 1.0.0
	 */
	public function enqueue_admin_styles() {
		$admin_page = \get_current_screen();

		if ( !\is_null( $admin_page ) && 'toplevel_page_codeneon-plugin-suites' === $admin_page->id ) {
			\wp_enqueue_style( CPS_TEXTDOMAIN . '-settings-styles', \plugins_url( 'assets/css/settings.css', CPS_PLUGIN_ABSOLUTE ), array( 'dashicons' ), CPS_VERSION );
		}

		\wp_enqueue_style( CPS_TEXTDOMAIN . '-admin-styles', \plugins_url( 'assets/css/admin.css', CPS_PLUGIN_ABSOLUTE ), array( 'dashicons' ), CPS_VERSION );
	}

	/**
	 * Register and enqueue admin-specific JavaScript.
	 *
	 * @since 1.0.0
	 */
	public function enqueue_admin_scripts() {
		$admin_page = \get_current_screen();

		if ( !\is_null( $admin_page ) && 'toplevel_page_codeneon-plugin-suites' === $admin_page->id ) {
			\wp_enqueue_script( CPS_TEXTDOMAIN . '-settings-script', \plugins_url( 'assets/js/settings.js', CPS_PLUGIN_ABSOLUTE ), array( 'jquery', 'jquery-ui-tabs' ), CPS_VERSION, false );
		}

		\wp_enqueue_script( CPS_TEXTDOMAIN . '-admin-script', \plugins_url( 'assets/js/admin.js', CPS_PLUGIN_ABSOLUTE ), array( 'jquery' ), CPS_VERSION, false );
	}


}
