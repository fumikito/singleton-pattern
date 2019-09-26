<?php

use Hametuha\SingletonPatternTest\Stab;

/**
 * Test singleton pattern.
 */
class SingletonTest extends \PHPUnit\Framework\TestCase {
	
	/**
	 * Test instance validity.
	 */
	public function testInstance() {
		$instance = Stab::get_instance();
		$this->assertEquals( 10, $instance->get_count() );
		$instance->increment();
		$this->assertEquals( 11, $instance->get_count() );
		$this->assertEquals( $instance, Stab::get_instance() );
		Stab::get_instance()->increment();
		$this->assertEquals( 12, $instance->get_count() );
	}
	
	/**
	 * Check accessibility.
	 *
	 */
	public function testAccessibility() {
		// Is constructor accessible?
		$reflection = new \ReflectionClass( Stab::class );
		$constructor = $reflection->getConstructor();
		$this->assertFalse( $constructor->isPublic() );
		$method = $reflection->getMethod( 'get_instance' );
		$this->assertTrue( $method->isFinal() );
	}
}
