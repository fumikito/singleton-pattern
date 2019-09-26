<?php

use Hametuha\SingletonPattern\BulkRegister;

/**
 * Test singleton pattern.
 */
class BulkRegisterTest extends \PHPUnit\Framework\TestCase {
	
	/**
	 * Test registration.
	 */
	public function testRegister() {
		$this->assertEquals( 2, BulkRegister::enable( 'Hametuha\SingletonPatternTest\Autoloaded', __DIR__ . '/src/Hametuha/SingletonPatternTest/Autoloaded' ) );
	}
}
