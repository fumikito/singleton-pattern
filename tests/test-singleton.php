<?php

/**
 * Test singleton pattern.
 */
class SingletonTest extends \PHPUnit\Framework\TestCase {
	
	/**
	 * Test instance validity.
	 */
	public function testInstance() {
		$instance = HametuhaSingletonPatternStab::get_instance();
		$this->assertEquals( 10, $instance->get_count() );
		$instance->increment();
		$this->assertEquals( 11, $instance->get_count() );
		$this->assertEquals( $instance, HametuhaSingletonPatternStab::get_instance() );
		HametuhaSingletonPatternStab::get_instance()->increment();
		$this->assertEquals( 12, $instance->get_count() );
	}
	
	/**
	 * Check accessibility.
	 *
	 * @expectedException Error
	 */
	public function testAccessibility() {
		// Construction fails.
		$instance = new HametuhaSingletonPatternStab();
	}
}
