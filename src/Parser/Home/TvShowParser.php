<?php
/**
 * Created by PhpStorm.
 * User: reynier.delarosa
 * Date: 14/06/2018
 * Time: 17:15
 */

namespace ImdbScraper\Parser\Home;

use ImdbScraper\Parser\AbstractIntegerParser;

class TvShowParser extends AbstractIntegerParser
{

    /**
     * @return string
     */
    public function getPattern(): string
    {
        return '|<div class="titleParent"><a href="/title/tt([0-9]{7,})"|U';
    }
}
