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

$cps_debug = new WPBP_Debug( __( 'Plugin Name', CPS_TEXTDOMAIN ) );

/**
 * Log text inside the debugging plugins.
 *
 * @param string $text The text.
 * @return void
 */
function cps_log( string $text ) {
	global $cps_debug;
	$cps_debug->log( $text );
}
