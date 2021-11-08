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

namespace Codeneon_Plugin_Suites\Integrations;

use Codeneon_Plugin_Suites\Engine\Base;

/**
 * Fake Pages inside WordPress
 */
class FakePage extends Base {

	/**
	 * Initialize the class.
	 *
	 * @return void|bool
	 */
	public function initialize() {
		parent::initialize();

		new \Fake_Page(
			array(
				'slug'         => 'fake_slug',
				'post_title'   => 'Fake Page Title',
				'post_content' => 'This is the fake page content',
			)
		);
	}

}
