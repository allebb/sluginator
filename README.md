Sluginator
==========

A simple URL slug creation library for PHP, simply feed it a string (such as a blog title) and it will create a URL friendly slug.

Requirements
------------

* PHP >= 5.4.x

License
-------

This client library is released under the MIT license, [LICENSE](a copy of the license) is provided in this package..

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

In the above example we have request that the slug character case remains untouched and instead of splitting spaces with a hypen (-) we will instead replace them with underscore characters (_) instead.

Support
-------

I am happy to provide support via. my personal email address, so if you need a hand drop me an email at: [ballen@bobbyallen.me]().