<?php

namespace Ballen\Sluginator;

/**
 * Sluginator
 *
 * A simple URL slug creation library for PHP, simply feed it a string (such as
 * a blog title) and it will create a URL friendly slug.
 *
 * @author Bobby Allen <ballen@bobbyallen.me>
 * @version 1.0.0
 * @license http://opensource.org/licenses/MIT
 * @link https://github.com/bobsta63/sluginator
 * @link http://www.bobbyallen.me
 *
 */
class Slug
{

    /**
     * Stores the plaintext string.
     * @var string 
     */
    protected $original;

    /**
     * Array that stores values that you wish to remove (characters to delete from the string)
     * @var array
     */
    protected $remove_values = [
        "~", "`", "!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "_", "=", "+", "[", "{", "]",
        "}", "\\", "|", ";", ":", "\"", "'", "&#8216;", "&#8217;", "&#8220;", "&#8221;", "&#8211;", "&#8212;",
        "â€”", "â€“", ",", "<", ".", ">", "/", "?"
    ];

    /**
     * Array of characters that should be converted to the 'space' character.
     * @var array
     */
    protected $space_values = [
        ' ',
    ];

    /**
     * The character to use for space replacement.
     * @var string
     */
    protected $space_char = '-';

    /**
     * URL encode the output?
     * @var boolean
     */
    protected $url_encode = false;

    /**
     * Convert the text to all lowercase characters?
     * @var boolean
     */
    protected $use_lowercase = false;

    /**
     * Stores the generated slug.
     * @var string 
     */
    protected $slug;

    public function __construct($input)
    {
        $this->original = $input;
        $this->build();
    }

    /**
     * Generate the slug.
     * @return \Ballen\Sluginator\Sluginator
     */
    public function build()
    {
        $slug = $this->original;
        $slug = trim(strip_tags($slug));
        $slug = str_replace($this->space_values, $this->space_char, $slug);
        $slug = str_replace($this->remove_values, '', $slug);

        if ($this->url_encode)
            $slug = urlencode($slug);

        if ($this->use_lowercase)
            $slug = strtolower($slug);

        $this->slug = $slug;
        return $this;
    }

    /**
     * Returns the generated slug string.
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Returns the generated slug string
     * @return string
     */
    public function __toString()
    {
        return $this->getSlug();
    }

    /**
     * Sets a new set of reules of which should be handled as 'space' characters.
     * @param array $values
     * @return \Ballen\Sluginator\Sluginator
     */
    public function setSpaceValues(Array $values)
    {
        $this->space_values = $values;
        return $this;
    }

    /**
     * Sets a new set of rules of which will be 'removed' from the strnig.
     * @param array $values
     * @return \Ballen\Sluginator\Sluginator
     */
    public function setRemoveValues(Array $values)
    {
        $this->remove_values = $values;
        return $this;
    }

    /**
     * Add a new item to the Space values ruleset.
     * @param string $value
     * @return \Ballen\Sluginator\Sluginator
     */
    public function addSpaceValue($value)
    {
        $this->space_values[] = $value;
        return $this;
    }

    /**
     * Add a new item to the remove values ruleset.
     * @param string $value
     * @return \Ballen\Sluginator\Sluginator
     */
    public function addRemoveValue($value)
    {
        $this->remove_values[] = $value;
        return $this;
    }

    /**
     * Convert generated slugs to lowercase strings.
     * @param boolean $lowercase
     * @return \Ballen\Sluginator\Sluginator
     */
    public function setUseLowercase($lowercase = true)
    {
        $this->use_lowercase = $lowercase;
        return $this;
    }

    /**
     * Convert generated slugs to lowercase strings.
     * @param boolean $encode
     * @return \Ballen\Sluginator\Sluginator
     */
    public function setUrlEncode($encode = true)
    {
        $this->url_encode = $encode;
        return $this;
    }

    /**
     * Sets the character of which is used to replace spaces.
     * @param string $char
     * @return \Ballen\Sluginator\Sluginator
     */
    public function setSpaceCharacter($char = '-')
    {
        $this->space_char = $char;
        return $this;
    }

}
