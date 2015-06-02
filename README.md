Sluginator
==========

[![Build Status](https://travis-ci.org/bobsta63/sluginator.svg)](https://travis-ci.org/bobsta63/sluginator)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/bobsta63/sluginator/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/bobsta63/sluginator/?branch=master)
[![Latest Stable Version](https://poser.pugx.org/ballen/sluginator/v/stable)](https://packagist.org/packages/ballen/sluginator)
[![Latest Unstable Version](https://poser.pugx.org/ballen/sluginator/v/unstable)](https://packagist.org/packages/ballen/sluginator)
[![License](https://poser.pugx.org/ballen/sluginator/license)](https://packagist.org/packages/ballen/sluginator)

A URL slug creation and sanitisation library for PHP, simply feed it a string (such as a blog title) and it will create a URL friendly slug.

Requirements
------------

This library is developed and tested for PHP 5.3+

This library is unit tested against PHP 5.3, 5.4, 5.5, 5.6, HHVM and 7.0!

License
-------

This client library is released under the MIT license, a [copy of the license](LICENSE) is provided in this package.

## Setup

I highly recommend the use of [Composer](https://getcomposer.org/) when installing and using this library, it is not mandatory however and you can use a provided 'include' script to load in this library if required.

### Composer

To add this library to your project, edit your ``composer.json`` file and add the following lines (or update your existing ``require`` section with the library like so):

```php
"require": {
        "ballen/sluginator": "~1.0"
}
```

Then install the package like so:

```
composer install ballen/sluginator --no-dev
```

### Standalone

You can use the library "standalone" by downloading it from the [GitHub releases section](https://github.com/bobsta63/distical/releases), extracting the files to a place on your server and then adding the "include" into your code like so:

```php
require_once 'path/to/Sluginator/lib/Slug.php';
```

Examples
--------

```php

use Ballen\Sluginator\Slug;

$slug = new Slug('My awesomely *wickid* example title!!!');

echo $slug;

```

The output will be ``my-awesomely-wickid-example-title``.

The library also contains other useful methods to enable you to:

* Specify characters of which should be removed from the string, by default a healthy set of non-url characters are removed.
* Specify a different space replacement character (by default this is a hyphen '-').
* Output the slug with or without URL encoding (disabled by default as not required).
* Force output as all lowercase character (default is 'true').

Here is an example using a few extra settings:

```php

use Ballen\Sluginator\Slug;

$slug = new Slug('My awesomely *wickid* example title!!!');

$slug->setUseLowercase(false)->setSpaceCharacter('_')->build();

echo $slug->getSlug();
```

In the above example we have request that the slug character case remains untouched and instead of splitting spaces with a hyphen (-) we will instead replace them with underscore characters (_) instead.

## Tests and coverage

This library is fully unit tested using [PHPUnit](https://phpunit.de/).

I use TravisCI for continuous integration, which triggers tests for PHP 5.3, 5.4, 5.5, 5.6, 7.0 and HHVM every time a commit is pushed.

If you wish to run the tests yourself you should run the following:

```
# Install the Sluginator Library with the 'development' packages this then including PHPUnit!
composer install --dev

# Now we run the unit tests (from the root of the project) like so:
./vendor/bin/phpunit
```

Code coverage can also be ran but requires XDebug installed...
```
./vendor/bin/phpunit --coverage-html ./report
```

Support
-------

I am happy to provide support via. my personal email address, so if you need a hand drop me an email at: [ballen@bobbyallen.me]().
