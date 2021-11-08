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

namespace Codeneon_Plugin_Suites\Cli;

use Codeneon_Plugin_Suites\Engine\Base;

if ( \defined( 'WP_CLI' ) && WP_CLI ) {

	/**
	 * WP CLI command example
	 */
	class Example extends Base {

		/**
		 * Initialize the commands
		 *
		 * @since 1.0.0
		 */
		public function __construct() {
			\WP_CLI::add_command( 'cps_commandname', array( $this, 'command_example' ) );
		}

		/**
		 * Initialize the class.
		 *
		 * @return void|bool
		 */
		public function initialize() {
			if ( !\apply_filters( 'codeneon_plugin_suites_cps_enqueue_admin_initialize', true ) ) {
				return;
			}

			parent::initialize();
		}

		/**
		 * Example command
		 * API reference: https://wp-cli.org/docs/internal-api/
		 *
		 * @since 1.0.0
		 * @param array $args The attributes.
		 * @return void
		 */
		public function command_example( array $args ) {
			// Message prefixed with "Success: ".
			\WP_CLI::success( $args[0] );
			// Message prefixed with "Warning: ".
			\WP_CLI::warning( $args[0] );
			// Message prefixed with "Debug: ". when '--debug' is used
			\WP_CLI::debug( $args[0] );
			// Message prefixed with "Error: ".
			\WP_CLI::error( $args[0] );
			// Message with no prefix
			\WP_CLI::log( $args[0] );
			// Colorize a string for output
			\WP_CLI::colorize( $args[0] );
			// Halt script execution with a specific return code
			\WP_CLI::halt( $args[0] );
		}

	}

}
