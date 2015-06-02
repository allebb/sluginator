<?php
use Ballen\Sluginator\Slug;
use \PHPUnit_Framework_TestCase;

class SluglTest extends PHPUnit_Framework_TestCase
{

    protected $test_string = 'A very long word that contains some spaces, punctuation and some strong charaters!!';

    public function testSimpleSlugWithToStringMethod()
    {
        $slug = new Slug($this->test_string);
        $this->assertEquals('A-very-long-word-that-contains-some-spaces-punctuation-and-some-strong-charaters', $slug);
    }

    public function testSimpleSlugWithGetSlugMethod()
    {
        $slug = new Slug($this->test_string);
        $this->assertEquals('A-very-long-word-that-contains-some-spaces-punctuation-and-some-strong-charaters', $slug->build());
    }

    public function testSimpleSlugToLowerCase()
    {
        $slug = new Slug($this->test_string);
        $slug->setUseLowercase();
        $this->assertEquals('a-very-long-word-that-contains-some-spaces-punctuation-and-some-strong-charaters', $slug->build());
    }

    public function testSlugWithUrlEncoding()
    {
        $slug = new Slug('An example of a currency (eg. £) title');
        $slug->setUrlEncode();
        $this->assertEquals('An-example-of-a-currency-eg-%C2%A3-title', $slug->build());
    }
}
