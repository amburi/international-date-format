<?php

namespace helpers;

use Cassandra\Date;
use DateTime;
use IntlDateFormatter;
use InvalidArgumentException;

/**
 * International Date Formatter Helper
 */
class IntlDateFormatterHelper
{
    private int $dateType = IntlDateFormatter::SHORT;
    private int $timeType = IntlDateFormatter::NONE;
    private IntlDateFormatter $intlDateFormatter;

    public function __construct(string $locale)
    {
        $this->intlDateFormatter = new IntlDateFormatter($locale, $this->dateType, $this->timeType);
    }

    /**
     * String-to-timestamp international date formatter
     *
     * @param string $date
     * @param string $fromFormat
     * @return int
     */
    public function parseTimestamp(string $date, string $fromFormat): int
    {
        if (empty($date) || empty($fromFormat)) {
            throw new InvalidArgumentException("Enter proper date");
        }

        $this->intlDateFormatter->setPattern($fromFormat);
        return $this->intlDateFormatter->parse($date);
    }

    /**
     * String-to-date object international date formatter
     *
     * @param string $date
     * @param string $fromFormat
     * @return Date
     */
    public function parseDate(string $date, string $fromFormat): Date
    {
        $timestamp = $this->parseTimestamp($date, $fromFormat);
        return new Date($timestamp);
    }

    /**
     * String-to-String international date formatter
     *
     * @param string $date
     * @param string $fromFormat
     * @param string $toFormat
     * @return string
     */
    public function formatStrToStr(string $date, string $fromFormat, string $toFormat): string
    {
        if (empty($date) || empty($fromFormat) || empty($toFormat)) {
            throw new InvalidArgumentException("Enter proper date");
        }

        $timestamp = $this->parseTimestamp($date, $fromFormat);
        $datetime = new DateTime();
        $datetime->setTimestamp($timestamp);
        return $datetime->format($toFormat);
    }

}