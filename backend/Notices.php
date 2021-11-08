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
use Yoast_I18n_WordPressOrg_v3;

/**
 * Everything that involves notification on the WordPress dashboard
 */
class Notices extends Base {

	/**
	 * Initialize the class
	 *
	 * @return void|bool
	 */
	public function initialize() {
		if ( !parent::initialize() ) {
			return;
		}

		\wpdesk_wp_notice( \__( 'Updated Messages', CPS_TEXTDOMAIN ), 'updated' );
		\wpdesk_wp_notice( \__( 'This is my dismissible notice', CPS_TEXTDOMAIN ), 'error', true );

		/*
		 * Review plugin notice.
		 */
		new \WP_Review_Me(
			array(
				'days_after' => 15,
				'type'       => 'plugin',
				'slug'       => CPS_TEXTDOMAIN,
				'rating'     => 5,
				'message'    => \__( 'Review me!', CPS_TEXTDOMAIN ),
				'link_label' => \__( 'Click here to review', CPS_TEXTDOMAIN ),
			)
		);

		/*
		 * Alert after few days to suggest to contribute to the localization if it is incomplete
		 * on translate.wordpress.org, the filter enables to remove globally.
		 */
		if ( \apply_filters( 'codeneon_plugin_suites_alert_localization', true ) ) {
			new Yoast_I18n_WordPressOrg_v3(
			array(
				'textdomain'  => CPS_TEXTDOMAIN,
				'codeneon_plugin_suites' => CPS_NAME,
				'hook'        => 'admin_notices',
			),
			true
			);
		}

	}

}
