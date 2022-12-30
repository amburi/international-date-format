<?php

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
     * International Date Formatter
     *
     * @param String $date
     * @param String $fromFormat
     * @param String $toFormat
     * @return string
     */
    public function parseDate(string $date, string $fromFormat, string $toFormat): string
    {
        // convert international timestamp
        $this->intlDateFormatter->setPattern($fromFormat);
        $formatTimestamp = $this->intlDateFormatter->parse($date);

        // now convert timestamp to any date format
        $datetime = new DateTime();
        $datetime->setTimestamp($formatTimestamp);
        return $datetime->format($toFormat);
    }

}