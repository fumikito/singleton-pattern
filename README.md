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

## License

GPL 3.0 or later.