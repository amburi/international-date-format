<?php

namespace tests;

require_once("./src/helpers/IntlDateFormatterHelper.php");
require_once("./src/interfaces/Locales.php");

use helpers\IntlDateFormatterHelper;
use interfaces\Locales;
use PHPUnit\Framework\TestCase;

class IntlDateFormatterHelperTest extends TestCase
{
    /**
     * Tests to validate date formatting from German to English.
     * @return void
     */
    public function testFormatStrToStrDE()
    {
        $date = 'So., 01.01.2023';
        $locale = Locales::DE_LOCALE;
        $inputDateFormat = 'EEEEEE., d.m.y';
        $outputDateFormat = 'l jS \of F Y';
        $expectedDate = 'Sunday 1st of January 2023';

        $intlDateFormat = new IntlDateFormatterHelper($locale);
        $actualDate = $intlDateFormat->formatStrToStr($date, $inputDateFormat, $outputDateFormat);

        $this->assertEquals(
            $expectedDate,
            $actualDate
        );
    }

    /**
     * Test to validate the date formatting from French into English.
     * @return void
     */
    public function testFormatStrToStrFR()
    {
        $date = 'Lundi, 08 Juillet 2013 09:09';
        $locale = Locales::FR_LOCALE;
        $inputDateFormat = 'EEEE, dd MMMM y hh:mm';
        $outputDateFormat = 'l jS \of F Y h:i:s A';
        $expectedDate = 'Monday 8th of July 2013 09:09:00 AM';

        $intlDateFormat = new IntlDateFormatterHelper($locale);
        $actualDate = $intlDateFormat->formatStrToStr($date, $inputDateFormat, $outputDateFormat);

        $this->assertEquals(
            $expectedDate,
            $actualDate
        );
    }
}
