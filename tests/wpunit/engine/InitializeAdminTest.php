<?php

namespace Codeneon_Plugin_Suites\Tests\WPUnit;

class InitializeAdminTest extends \Codeception\TestCase\WPTestCase {
	/**
	 * @var string
	 */
	protected $root_dir;

	public function setUp() {
		parent::setUp();

		// your set up methods here
		$this->root_dir = dirname( dirname( dirname( __FILE__ ) ) );

	$user_id = $this->factory->user->create( array( 'role' => 'administrator' ) );
		wp_set_current_user( $user_id );
		set_current_screen( 'edit.php' );
	}

	public function tearDown() {
		parent::tearDown();
	}

	/**
	 * @test
	 * it should be admin
	 */
	public function it_should_be_admin() {
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
		$classes[] = 'Codeneon_Plugin_Suites\Backend\ActDeact';
		$classes[] = 'Codeneon_Plugin_Suites\Backend\Enqueue';
		$classes[] = 'Codeneon_Plugin_Suites\Backend\ImpExp';
		$classes[] = 'Codeneon_Plugin_Suites\Backend\Notices';
		$classes[] = 'Codeneon_Plugin_Suites\Backend\Pointers';
		$classes[] = 'Codeneon_Plugin_Suites\Backend\Settings_Page';

		$this->assertTrue( is_admin() );
		foreach( $classes as $class ) {
			$this->assertTrue( class_exists( $class ) );
		}
	}

}
