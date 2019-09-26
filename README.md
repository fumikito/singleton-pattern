# singleton-pattern

PHP abstract singleton patter.

[![Travis CI](https://travis-ci.org/hametuha/singleton-pattern.svg?branch=master)](https://travis-ci.org/hametuha/singleton-pattern)

## Installation

```
composer require hametuha/singleton-pattern
```

## How to Use

Inherit from abstract class `Hametuha\SingletonPattern\Singleton`.

```php
<?php

use Hametuha\SingletonPattern\Singleton;

class SampleSingleton extends Singleton {

    private $version = '';

    /**
     * This method is called inside constructor.
     */
    protected function init() {
        $this->version = get_wp_version();
    }

    /**
     * Greeting.
     */
    public function greet() {
        echo 'Hello World!';
    }
}

```

Then, call it outside.

```php
<?php

SampleSingleton::get_instance()->greet();
// -> Hello World!

```

### Bulk Registration

If you have PSR-0(or maybe PSR-4) based structure, you can bulk register them. For examle...

```
src
└Vendor
　└Library
　　└NameSpace
　　　├SampleClass
　　　├OtherClass
　　　└AnotherClass
```

You can call `BulkRegister::enable` to load them all!

```
Hametuha\SingletonPatter\BulkRegister::enable( 'Vendor\Library\NameSpace', __DIR__ . '/src/Vendor/Library/NameSpace' );
// => 3(enabled class count)
```

Syntax is like below:

`BulkRegister::enable( $namespace, $directory_to_scan, $subclass, $method )`

- `$namespace` Name space prefix. In the case above, `Vendor/Library\NameSpace`.
- `$directory_to_scan` This directory will be scanned. **Not recursively**
- `$subclasss` Class should be subclass of this class name. Defautl is `Hametuha\SingletonPattern\Singleton`.
- `$method` Static method to call. Default is `get_instance()`.

## License

GPL 3.0 or later.