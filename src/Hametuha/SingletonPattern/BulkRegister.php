<?php

namespace Hametuha\SingletonPattern;


/**
 * Bulk register namespaced class.
 *
 * @package singleton-pattern
 */
class BulkRegister {
	
	final private function __construct() {
		// Avoid making an instance.
	}
	
	/**
	 * Scan directory and initialize.
	 *
	 * @param string $namespace_prefix  Namespace prefix to add before class name.
	 * @param string $directory_to_scan Directory to scan. Classes inside this directory is treated as PHP class file under PSR-0.
	 * @param string $subclass          Default is `Hametuha\SingletonPattern\Singleton`.
	 * @param string $method            Static method name. Default is `get_instance`
	 * @return int Initialized class.
	 */
	public static function enable( $namespace_prefix, $directory_to_scan, $subclass = 'Hametuha\SingletonPattern\Singleton', $method = 'get_instance' ) {
		$enabled = 0;
		if ( ! is_dir( $directory_to_scan ) ) {
			return $enabled;
		}
		foreach ( scandir( $directory_to_scan ) as $file ) {
			if ( ! preg_match( '/^([^._].*)\.php$/u', $file, $matches ) ) {
				continue;
			}
			// Check class exists.
			$class_name = [ $namespace_prefix, $matches[ 1 ] ];
			$class_name = implode( '\\', array_filter( $class_name ) );
			if ( ! class_exists( $class_name ) ) {
				continue;
			}
			// Check class is subclass of.
			try {
				$reflection = new \ReflectionClass( $class_name );
				if ( ! $reflection || ! $reflection->isSubclassOf( $subclass ) || ! $reflection->hasMethod( $method ) ) {
					continue;
				}
				$class_name::{$method}();
				$enabled ++;
			} catch ( \Exception $e ) {
				continue;
			}
		}
		
		return $enabled;
	}
}