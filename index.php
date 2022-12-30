<?php

use helpers\IntlDateFormatterHelper;
use interfaces\Locales;

require_once("./src/helpers/IntlDateFormatterHelper.php");
require_once("./src/interfaces/Locales.php");


$date = 'So., 01.01.2023';
$locale = Locales::DE_LOCALE;

// Here $fromFormat have used unicode date field symbols
// refer: https://www.unicode.org/reports/tr35/tr35-dates.html#Date_Field_Symbol_Table
$inputDateFormat = 'EEEEEE., d.m.y';
$outputDateFormat = 'l jS \of F Y';

$intlDateFormat = new IntlDateFormatterHelper($locale);
$enDate = $intlDateFormat->formatStrToStr($date, $inputDateFormat, $outputDateFormat);
echo 'From ' . $date . ' to ' . $enDate . "<br />";


/**
 * Here, convert the date from French into English.
 * The date in French is 'Lundi, 08 Juillet 2013 09:09',
 * and convert it to English 'Monday 8th of July 2013 09:09:00 AM'.
 */
$date = 'Lundi, 08 Juillet 2013 09:09';
$locale = Locales::FR_LOCALE;
$inputDateFormat = 'EEEE, dd MMMM y hh:mm';
$outputDateFormat = 'l jS \of F Y h:i:s A';

$intlDateFormat = new IntlDateFormatterHelper($locale);
$enDate = $intlDateFormat->formatStrToStr($date, $inputDateFormat, $outputDateFormat);
echo 'From ' . $date . ' to ' . $enDate . "<br />";