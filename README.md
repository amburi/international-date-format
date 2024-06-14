# International Date Formatter Helper
By [Amburi Roy](https://www.linkedin.com/in/amburi/)

`IntlDateFormatterHelper` is a PHP class designed to parse and reformat dates from various regions and locales. This helper allows you to handle dates in different languages and formats, making it easier to work with international date formats.

## Prerequisites

Ensure you have the following installed on your system:
- **PHP 7.4.33**
- **Composer version 2.4.2**
- **PHPUnit 9.5.10**

## Setup

### Step 1: Install Dependencies

First, you need to install all required dependencies using Composer. Open your terminal and navigate to the project directory, then run:

```bash
composer install
```

## Usage

### Example 1: Convert Dates from German to English

Let's convert a date written in German to English. For instance, the date in German is `'So., 01.01.2023'`, and we want to convert it to `'Sunday 1st of January 2023'`.

1. Define the date, locale, input date format, and output date format:

    ```php
    $date = 'So., 01.01.2023';
    $locale = Locales::DE_LOCALE;
    $inputDateFormat = 'EEEEEE., d.m.y';
    $outputDateFormat = 'l jS \of F Y';
    ```

2. Use `IntlDateFormatterHelper` to convert the date:

    ```php
    $intlDateFormat = new IntlDateFormatterHelper($locale);
    $enDate = $intlDateFormat->formatStrToStr($date, $inputDateFormat, $outputDateFormat);
    echo 'From '. $date .' to '. $enDate . "<br />";
    ```

### Example 2: Convert Dates from French to English

Now, let's convert a date from French to English. For instance, the date in French is `'Lundi, 08 Juillet 2013 09:09'`, and we want to convert it to `'Monday 8th of July 2013 09:09:00 AM'`.

1. Define the date, locale, input date format, and output date format:

    ```php
    $date = 'Lundi, 08 Juillet 2013 09:09';
    $locale = Locales::FR_LOCALE;
    $inputDateFormat = 'EEEE, dd MMMM y hh:mm';
    $outputDateFormat = 'l jS \of F Y h:i:s A';
    ```

2. Use `IntlDateFormatterHelper` to convert the date:

    ```php
    $intlDateFormat = new IntlDateFormatterHelper($locale);
    $enDate = $intlDateFormat->formatStrToStr($date, $inputDateFormat, $outputDateFormat);
    echo 'From '. $date .' to '. $enDate . "<br />";
    ```

### Output

When you run the above code, you should see the following output:

![Output](screenshots/output.png)

## Additional Methods

The helper also includes the `parseTimestamp()` and `parseDate()` methods. Use these methods as needed to handle other date parsing and formatting tasks. You can extend the `Locales` interface to add more locales.

## Running Tests

To execute all tests, run the following command:

```bash
phpunit src/tests
```

Alternatively, you can use:

```bash
./vendor/bin/phpunit src/tests
```

## Running the Project

To execute `index.php` locally on port `8080`, run:

```bash
php -S localhost:8080 -t .
```

You should see a message indicating that the PHP development server has started:

```plaintext
[Fri Dec 30 01:41:07 2022] PHP 7.4.33 Development Server (http://localhost:8080) started
```

## Technologies Used

- PHP 7.4.33
- Composer version 2.4.2
- PHPUnit 9.5.10

This project uses simple PHP functions, making it easy to integrate into various PHP frameworks.

## Conclusion

By following this tutorial, you should be able to set up and use the `IntlDateFormatterHelper` to handle international date formats effectively. Feel free to customize and extend the functionality to suit your specific needs.
