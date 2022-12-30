<?php
require_once("IntlDateFormatterHelper.php");

/**
 * First challenge is to convert German date into English format
 * The given German date is 'So., 01.01.2023' which means Sunday, 01 January 2023
 * Here we have to convert given German date into English 'Sunday 1st of January 2023' format
 * Here $fromFormat have used unicode date field symbols
 * refer: https://www.unicode.org/reports/tr35/tr35-dates.html#Date_Field_Symbol_Table
 */
$date = 'So., 01.01.2023';
$intlDateFormat = new IntlDateFormatterHelper("de_DE");
$enDate = $intlDateFormat->parseDate($date, 'EEEEEE., d.m.y', 'l jS \of F Y');
echo $enDate . "<br />";

/**
 * Second challenge is to convert French date into English format
 * The given French date is 'Lundi, 08 Juillet 2013 09:09' which means Monday, 08 July 2013 09:09
 * Here we have to convert given German date into English 'Monday 8th of July 2013 09:09:00 AM' format
 * Here $fromFormat I have used unicode date field symbols
 * refer: https://www.unicode.org/reports/tr35/tr35-dates.html#Date_Field_Symbol_Table
 */
$date = 'Lundi, 08 Juillet 2013 09:09';
$intlDateFormat = new IntlDateFormatterHelper("fr_FR");
$enDate = $intlDateFormat->parseDate($date, 'EEEE, dd MMMM y hh:mm', 'l jS \of F Y h:i:s A');
echo $enDate . "<br />";



