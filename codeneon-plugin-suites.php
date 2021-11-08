<?php

/**
 * @package   Codeneon_Plugin_Suites
 * @author    Alvind Caesar <alvind.caesar@gmail.com>
 * @copyright 2020 Codeneon Digital
 * @license   GPL 2.0+
 * @link      https://alvindcaesar.com/
 *
 * Plugin Name:     Codeneon Plugin Suites
 * Plugin URI:      @TODO
 * Description:     @TODO
 * Version:         1.0.0
 * Author:          Alvind Caesar
 * Author URI:      https://alvindcaesar.com/
 * Text Domain:     codeneon-plugin-suites
 * License:         GPL 2.0+
 * License URI:     http://www.gnu.org/licenses/gpl-3.0.txt
 * Domain Path:     /languages
 * Requires PHP:    7.0
 * WordPress-Plugin-Boilerplate-Powered: v3.2.0
 */

// If this file is called directly, abort.
if ( !defined( 'ABSPATH' ) ) {
	die( 'We\'re sorry, but you can not directly access this file.' );
}

define( 'CPS_VERSION', '1.0.0' );
define( 'CPS_TEXTDOMAIN', 'codeneon-plugin-suites' );
define( 'CPS_NAME', 'Codeneon Plugin Suites' );
define( 'CPS_PLUGIN_ROOT', plugin_dir_path( __FILE__ ) );
define( 'CPS_PLUGIN_ABSOLUTE', __FILE__ );
define( 'CPS_MIN_PHP_VERSION', '7.0' );
define( 'CPS_WP_VERSION', '5.3' );

add_action(
	'init',
	static function () {
		load_plugin_textdomain( CPS_TEXTDOMAIN, false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
	}
	);

if ( version_compare( PHP_VERSION, CPS_MIN_PHP_VERSION, '<=' ) ) {
	add_action(
		'admin_init',
		static function() {
			deactivate_plugins( plugin_basename( __FILE__ ) );
		}
	);
	add_action(
		'admin_notices',
		static function() {
			echo wp_kses_post(
			sprintf(
				'<div class="notice notice-error"><p>%s</p></div>',
				__( '"Codeneon Plugin Suites" requires PHP 5.6 or newer.', CPS_TEXTDOMAIN )
			)
			);
		}
	);

	// Return early to prevent loading the plugin.
	return;
}

$codeneon_plugin_suites_libraries = require_once CPS_PLUGIN_ROOT . 'vendor/autoload.php';

require_once CPS_PLUGIN_ROOT . 'functions/functions.php';
require_once CPS_PLUGIN_ROOT . 'functions/debug.php';

// Add your new plugin on the wiki: https://github.com/WPBP/WordPress-Plugin-Boilerplate-Powered/wiki/Plugin-made-with-this-Boilerplate

$requirements = new \Micropackage\Requirements\Requirements(
	'Plugin Name',
	array(
		'php'            => CPS_MIN_PHP_VERSION,
		'php_extensions' => array( 'mbstring' ),
		'wp'             => CPS_WP_VERSION,
		// 'plugins'            => array(
		// array( 'file' => 'hello-dolly/hello.php', 'name' => 'Hello Dolly', 'version' => '1.5' )
		// ),
	)
);

if ( ! $requirements->satisfied() ) {
	$requirements->print_notice();

	return;
}



// Documentation to integrate GitHub, GitLab or BitBucket https://github.com/YahnisElsts/plugin-update-checker/blob/master/README.md
Puc_v4_Factory::buildUpdateChecker( 'https://github.com/user-name/repo-name/', __FILE__, 'unique-plugin-or-theme-slug' );

if ( ! wp_installing() ) {
	add_action(
		'plugins_loaded',
		static function () use ( $codeneon_plugin_suites_libraries ) {
			new \Codeneon_Plugin_Suites\Engine\Initialize( $codeneon_plugin_suites_libraries );
		}
	);
}
