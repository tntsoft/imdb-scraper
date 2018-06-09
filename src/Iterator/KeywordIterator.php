<?php
/**
 * Created by PhpStorm.
 * User: reynier.delarosa
 * Date: 08/06/2018
 * Time: 12:24
 */

namespace ImdbScraper\Iterator;


class KeywordIterator extends AbstractRegexIterator
{

    public function __construct($input = array(), int $flags = 0, string $iterator_class = "ArrayIterator")
    {
        parent::__construct($input, $flags, $iterator_class);
        $this->modelClassName = 'ImdbScraper\Model\Keyword';
    }
}