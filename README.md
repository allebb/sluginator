Sluginator
==========

[![Build](https://github.com/allebb/sluginator/workflows/build/badge.svg)](https://github.com/allebb/sluginator/actions)
[![Code Coverage](https://codecov.io/gh/allebb/sluginator/branch/master/graph/badge.svg)](https://codecov.io/gh/allebb/sluginator)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/allebb/sluginator/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/allebb/sluginator/?branch=master)
[![Latest Stable Version](https://poser.pugx.org/ballen/sluginator/v/stable)](https://packagist.org/packages/ballen/sluginator)
[![Latest Unstable Version](https://poser.pugx.org/ballen/sluginator/v/unstable)](https://packagist.org/packages/ballen/sluginator)
[![License](https://poser.pugx.org/ballen/sluginator/license)](https://packagist.org/packages/ballen/sluginator)

A URL slug creation and sanitisation library for PHP, simply feed it a string (such as a blog title) and it will create a URL friendly slug.

Requirements
------------

This library is unit tested against PHP 7.3, 7.4, 8.0, 8.1 and 8.2!

If you need to use an older version of PHP, you should instead install the 2.x version of this library (see below for details).

## License

This client library is released under the MIT license, a [copy of the license](LICENSE) is provided in this package.

## Setup

I highly recommend the use of [Composer](https://getcomposer.org/) when installing and using this library, it is not mandatory however and you can use a provided 'include' script to load in this library if required.

### Composer

Add the latest version of Sluginator to your project by running:

```
composer require ballen/sluginator
```

**If you need to use an older version of PHP, version 1.x.x supports PHP 5.6, 7.0, 7.1 and 7.2, you can install this version using Composer with this command instead:**

```shell
composer require ballen/sluginator ^1.0
```

### Standalone

You can use the library "standalone" by downloading it from the [GitHub releases section](https://github.com/allebb/sluginator/releases), extracting the files to a place on your server and then adding the "include" into your code like so:

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

I use GitHub Actions for continuous integration, which triggers the unit tests each time a commit is pushed.

If you wish to run the tests yourself you should run the following:

```
# Install the Sluginator Library with the 'development' packages this then including PHPUnit!
composer install

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
