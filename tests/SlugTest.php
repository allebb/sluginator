<?php

use Ballen\Sluginator\Slug;
use \PHPUnit_Framework_TestCase;

class SlugTest extends PHPUnit_Framework_TestCase
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
        $this->assertEquals('A-very-long-word-that-contains-some-spaces-punctuation-and-some-strong-charaters',
            $slug->build());
    }

    public function testSimpleSlugToLowerCase()
    {
        $slug = new Slug($this->test_string);
        $slug->setUseLowercase();
        $this->assertEquals('a-very-long-word-that-contains-some-spaces-punctuation-and-some-strong-charaters',
            $slug->build());
    }

    public function testSlugWithUrlEncoding()
    {
        $slug = new Slug('An example of a currency (eg. £) title');
        $slug->setUrlEncode();
        $this->assertEquals('An-example-of-a-currency-eg-%C2%A3-title', $slug->build());
    }

    public function testCustomSpaceItem()
    {
        $slug = new Slug($this->test_string);
        $slug->addSpaceValue('!');
        $this->assertEquals('A-very-long-word-that-contains-some-spaces-punctuation-and-some-strong-charaters--',
            $slug->build());
    }

    public function testCustomSpaceCharacter()
    {
        $slug = new Slug($this->test_string);
        $slug->setSpaceCharacter(' ');
        $this->assertEquals('A very long word that contains some spaces punctuation and some strong charaters',
            $slug->build());
    }

    public function testCustomRemoveItem()
    {
        $slug = new Slug($this->test_string);
        $slug->addRemoveValue('a')->build();
        $this->assertEquals('A-very-long-word-tht-contins-some-spces-punctution-nd-some-strong-chrters',
            $slug->getSlug());
    }

    public function testCustomSpaceConfiguration()
    {
        $slug = new Slug($this->test_string);
        $slug->setSpaceValues([' ', ',', '!']);
        $this->assertEquals('A-very-long-word-that-contains-some-spaces--punctuation-and-some-strong-charaters--',
            $slug->build());
    }

    public function testCustomRemoveConfiguration()
    {
        $slug = new Slug($this->test_string);
        $slug->setRemoveValues(['-', ',', '!!'])->build();
        $this->assertEquals('Averylongwordthatcontainssomespacespunctuationandsomestrongcharaters', $slug->getSlug());
    }
}
