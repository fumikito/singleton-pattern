<?php
namespace Hametuha\SingletonPatternTest;


use Hametuha\SingletonPattern\Singleton;

/**
 * Stab class.
 */
class Stab extends Singleton {

	private $count = 0;
	
	/**
	 * Set initial number.
	 */
	protected function init() {
		$this->count = 10;
	}
	
	
	/**
	 * Increment count.
	 */
	public function increment() {
		$this->count++;
	}
	
	/**
	 * Get count.
	 *
	 * @return int
	 */
	public function get_count() {
		return $this->count;
	}

}
