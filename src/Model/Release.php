<?php
/**
 * Created by PhpStorm.
 * User: reynier.delarosa
 * Date: 30/04/2018
 * Time: 16:24
 */

namespace ImdbScraper\Model;


class Release implements RegexMatchRawData
{

    use DateParser;

    /** @var string */
    protected $country;

    /** @var array */
    protected $details;

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @param string $country
     * @return Release
     */
    public function setCountry(string $country): Release
    {
        $this->country = $country;
        return $this;
    }

    /**
     * @return array
     */
    public function getDetails(): array
    {
        return $this->details;
    }

    /**
     * @param array $details
     * @return Release
     */
    public function setDetails(array $details): Release
    {
        $this->details = $details;
        return $this;
    }

    /**
     * @param array $rawData
     * @param int $position
     * @return RegexMatchRawData
     */
    public function importData(array $rawData, int $position): RegexMatchRawData
    {
        return $this->setCountry($rawData[2][$position])
            ->parseDate($rawData[3][$position])
            ->setDetails(self::parseDetails($rawData[4][$position]));
    }

    protected static function parseDetails(string $rawData): array
    {
        $rawData = trim($rawData);
        $details = [];
        if (stripos($rawData, ')') !== false) {
            $details = explode(')', $rawData);
            array_walk($details, function (&$item) {
                $item = trim(str_replace('(', '', $item));
            });
            $details = array_filter($details, function ($item) {
                return !empty($item);
            });
        } elseif (!empty($rawData)) {
            $details[] = $rawData;
        }
        return $details;
    }
}