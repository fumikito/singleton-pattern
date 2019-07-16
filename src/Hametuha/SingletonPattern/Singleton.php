<?php

namespace Hametuha\SingletonPattern;

/**
 * Singleton pattern
 *
 * @package hametuha
 */
abstract class Singleton {
	
	private static $instances = [];
	
	/**
	 * Constructor
	 */
	final protected function __construct() {
		$this->init();
	}
	
	/**
	 * Do something inside constructor
	 */
	protected function init() {}
	
	/**
	 * Get instance
	 *
	 * @return static
	 */
	final public static function get_instance() {
		$class_name = get_called_class();
		if ( ! isset( self::$instances[ $class_name ] ) ) {
			self::$instances[ $class_name ] = new $class_name();
		}
		return self::$instances[ $class_name ];
	}
}
