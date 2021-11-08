<?php

namespace Codeneon_Plugin_Suites\Tests\WPUnit;

class InitializeTest extends \Codeception\TestCase\WPTestCase {
	/**
	 * @var string
	 */
	protected $root_dir;

	public function setUp() {
		parent::setUp();

		// your set up methods here
		$this->root_dir = dirname( dirname( dirname( __FILE__ ) ) );

	wp_set_current_user(0);
	wp_logout();
	wp_safe_redirect(wp_login_url());
	}

	public function tearDown() {
		parent::tearDown();
	}

	/**
	 * @test
	 * it should be front
	 */
	public function it_should_be_front() {
		$classes   = array();
		$classes[] = 'Codeneon_Plugin_Suites\Internals\PostTypes';
		$classes[] = 'Codeneon_Plugin_Suites\Internals\Shortcode';
		$classes[] = 'Codeneon_Plugin_Suites\Internals\Transient';
		$classes[] = 'Codeneon_Plugin_Suites\Integrations\CMB';
		$classes[] = 'Codeneon_Plugin_Suites\Integrations\Cron';
		$classes[] = 'Codeneon_Plugin_Suites\Integrations\FakePage';
		$classes[] = 'Codeneon_Plugin_Suites\Integrations\Template';
		$classes[] = 'Codeneon_Plugin_Suites\Integrations\Widgets';
		$classes[] = 'Codeneon_Plugin_Suites\Ajax\Ajax';
		$classes[] = 'Codeneon_Plugin_Suites\Ajax\Ajax_Admin';
		$classes[] = 'Codeneon_Plugin_Suites\Frontend\Enqueue';
		$classes[] = 'Codeneon_Plugin_Suites\Frontend\extras\Body_Class';

		foreach( $classes as $class ) {
			$this->assertTrue( class_exists( $class ) );
		}
	}

}
