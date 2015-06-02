<?php
use Ballen\Sluginator\Slug;
use \PHPUnit_Framework_TestCase;

class SluglTest extends PHPUnit_Framework_TestCase
{

    public function testSimpleSlug()
    {
        $slug = new Slug('A very long word that contains some spaces, punctuation and some strong charaters!!');
        $this->assertEquals('a-very-long-word-that-contains-some-spaces-punctuation-and-some-strong-charaters', $slug);
    }
}
