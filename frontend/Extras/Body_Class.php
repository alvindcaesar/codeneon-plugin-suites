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

namespace Codeneon_Plugin_Suites\Frontend\Extras;

use Codeneon_Plugin_Suites\Engine\Base;

/**
 * Add custom css class to <body>
 */
class Body_Class extends Base {

	/**
	 * Initialize the class.
	 *
	 * @return void|bool
	 */
	public function initialize() {
		parent::initialize();

		\add_filter( 'body_class', array( self::class, 'add_cps_class' ), 10, 3 );
	}

	/**
	 * Add class in the body on the frontend
	 *
	 * @param array $classes The array with all the classes of the page.
	 * @since 1.0.0
	 * @return array
	 */
	public static function add_cps_class( array $classes ) {
		$classes[] = CPS_TEXTDOMAIN;

		return $classes;
	}

}
