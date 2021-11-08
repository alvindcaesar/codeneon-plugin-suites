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

namespace Codeneon_Plugin_Suites\Ajax;

use Codeneon_Plugin_Suites\Engine\Base;

/**
 * AJAX as logged user
 */
class Ajax_Admin extends Base {

	/**
	 * Initialize the class.
	 *
	 * @return void|bool
	 */
	public function initialize() {
		if ( !\apply_filters( 'codeneon_plugin_suites_cps_ajax_admin_initialize', true ) ) {
			return;
		}

		// For logged user
		\add_action( 'wp_ajax_your_admin_method', array( $this, 'your_admin_method' ) );
	}

	/**
	 * The method to run on ajax
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function your_admin_method() {
		$return = array(
			'message' => 'Saved',
			'ID'      => 2,
		);

		\wp_send_json_success( $return );
		// wp_send_json_error( $return );
	}

}
