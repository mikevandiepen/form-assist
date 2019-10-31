# advanced-form-helper
[![Total Downloads](https://poser.pugx.org/mikevandiepen/form-validation-sanitization/downloads)](https://packagist.org/packages/mikevandiepen/form-validation-sanitization)
[![Latest Stable Version](https://poser.pugx.org/mikevandiepen/form-validation-sanitization/version)](https://packagist.org/packages/mikevandiepen/form-validation-sanitization)
[![Latest Stable Version](https://poser.pugx.org/phpunit/phpunit/version)](https://packagist.org/packages/phpunit/phpunit)
[![Version](https://img.shields.io/packagist/v/mikevandiepen/form-validation-sanitization.svg)](https://packagist.org/packages/mikevandiepen/form-validation-sanitization)
[![Software License][ico-license]](LICENSE.md)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/mikevandiepen/form-validation-sanitization/badges/code-intelligence.svg?b=master)](https://scrutinizer-ci.com/code-intelligence)
[![Build Status](https://scrutinizer-ci.com/b/mikevandiepen/advanced-form-helper/badges/build.png?b=master)](https://scrutinizer-ci.com/b/mikevandiepen/advanced-form-helper/build-status/master)
[![Code Coverage](https://scrutinizer-ci.com/g/mikevandiepen/form-validation-sanitization/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/mikevandiepen/form-validation-sanitization/?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/mikevandiepen/form-validation-sanitization/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/mikevandiepen/form-validation-sanitization/?branch=master)
[![Minimum PHP Version](https://img.shields.io/badge/php-_%5E7.1-8892BF.svg)](https://github.com/symfony/symfony)

## Be aware!
Not everything has been tested yet, use on own risk.

## Install

Via Composer

``` bash
$ composer require mikevandiepen/form-validation-sanitization
```

Via GIT
``` bash
HTTPS:
git clone https://github.com/mikevandiepen/form-validation-sanitization.git

SSH:
git clone git@github.com:mikevandiepen/form-validation-sanitization.git
```

## Usage

#### Sanitization

```php
<?php 
$clean = mikevandiepen\utility\Form::sanitize($_POST, [
       'name'  => 'sql|xss|trim',
       'email' => 'sql|xss|trim|email',
], $mysqli_connection);
/** 
 * @var $mysqli_connection - is optional, we recommend using prepared statements 
 * There is fallback code in place, yet it is not as optimal and secure as de mysql ways.
 */
``` 

#### Validation

```php
<?php 
mikevandiepen\utility\Form::validate($clean, [
    'name'  => 'required|string|min_length:6',
    'email' => 'required|email|allowed_providers:hotmail.com,outlook.com,live.com,gmail.com,yourwebsite.tld',
], $language);
/** 
 * @var  $language - is optional and defaults to english 
 * @path'./src/Validate/Translations/default.php'
 */
``` 

### Sanitization filters
| filter | functionality | 
|---:|:---|
|`sql` | Escapes the string against SQL injections. ***`(We still recommend to use prepared statements)`***  | 
|`xss` | Escapes the string against cross site scripting. | 
|`email` | Sanitizes the email and handles the special characters. | 
|`url` | Sanitizes the URL and handles the special characters. | 
|`numeric` | Sanitizes the numeric characters and makes sure that it is safe for use. | 
|`float` | Sanitizes the float characters and makes sure that it is safe for use. | 
|`json_encode` / `encode_json` | Encodes the value of the field to json format. | 
|`json_decode` / `decode_json` | Decodes the value of the field from json format to array. | 
|`trim` / `trim_all` | Trims the value of the field on both sides from spaces. | 
|`ltrim` / `left_trim` / `trim_left` | Trims the value of the field on the left side from spaces. | 
|`rtrim` / `right_trim` / `trim_right`| Trims the value of the field on the right side from spaces. | 
|`upper` / `uppercase` | Transforms the value of the field to uppercase. | 
|`lower` / `lowercase`| Transforms the value of the field to lowercase. | 
|`slug` / `slugify` / `to_slug` | Transforms the value of the field to a slug. | 
|`tags` / `strip_tags` | Strips all the HTML tags from the value of the field. | 

### Validation rules
| rule | functionality | 
|---:|:---|
| `required` | Whether the field is set and is not empty.| 
| `num` / `numeric` | Whether the value of the field is **numeric**. | 
| `float` | Whether the value of the field is a **float**. | 
| `bool` / `boolean` | Whether the value of the field is a **boolean**. | 
| `int` / `integer` | Whether the value of the field is an **integer**. | 
| `null` | Whether the value of the field is **null**. | 
| `string` | Whether the value of the field is a **string**. | 
| `array` | Whether the value of the field is an **array**. | 
| `before_date` | Whether the value of the field is before the threshold date. | 
| `after_date` | Whether the value of the field is after the threshold date. | 
| `between_dates` | Whether the value of the field between the two threshold dates. | 
| `starts_with` | Whether the value of the field starts with the threshold substring. | 
| `ends_with` | Whether the value of the field ends with the threshold substring. | 
| `contains` | Whether the value of the field contains the threshold substring. | 
| `regex` / `expression` / `regular_expresion` | Whether the value of the field matches the regular expression threshold pattern.  | 
| `exact_length` | Whether the value of the field matches the exact threshold length. | 
| `minlen` / `min_length` | Whether the value of the field has the minimal required threshold length. | 
| `maxlen` / `max_length` | Whether the value of the field has less then the maximal required threshold length. | 
| `email` | Whether the value of the field is an email. | 
| `url` | Whether the value of the field is an url.| 
| `domain` | Whether the value of the field is a domain name.| 
| `ip` / `ip_address` | Whether the value of the field is an IP address. | 
| `ipv4` / `ipv4_address` | Whether the value of the field is an IPv4 address. | 
| `ipv6` / `ipv6_address` | Whether the value of the field is an IPv6 address. | 
| `mac` / `mac_address` | Whether the value of the field is an MAC address | 
| `between` | Whether the value of the field between two values. | 
| `min` / `minimum` | Whether the value of the field has the minimum worth of the threshold. | 
| `max` / `maximum` | Whether the value of the field has less than the maximum worth of the threshold.| 
| `equal` / `equals` / `equal_to` / `equals_to` | Whether the value of the field equals the worth of the threshold. | 
| `not_equal` / `not_equal_to` | Whether the value of the field does not equal the worth of the threshold. |  
| `gt` / `greater_than` | Whether the value of the field is greater than the threshold. | 
| `gte` / `greater_than_or_equal_to` | Whether the value of the field is greater or equal to the threshold. | 
| `lt` / `less_than` | Whether the value of the field is lesser than the threshold. | 
| `lte` / `less_than_or_equal_to` | Whether the value of the field is lesser or equal to the threshold. | 
| `allowed_extensions` | Whether the file has an allowed extension. | 
| `allowed_mime_types` | Whether the file has an allowed mime-type. | 
| `max_size` / `max_file_size` | Whether the file is lesser or equal to the maximal file size. | 
| `allowed_providers` / `allowed_email_providers` | Whether the domain of the email address is from an allowed / whitelisted provider. | 
| `blocked_providers` / `blocked_email_providers` | Whether the domain of the email address is from an blocked / blacklisted provider. |
| `cc` / `credit_card` | Whether the creditcard which the user has entered is a valid one. |
| `iban` | Whether the iban which the user has entered is a valid one. |

## TODO:
- **New validation rules**
    - credit_card
    - iban
    - address (Location)
    - datetime format / pattern
- **Edit validation rules**
    - email (Ping the domain to check whether it is a real domain.)
- **Project changes**
    - Add a method where you can manually overwrite response translations
    - Create a facade with a different and lightweight approach for alternative validation
- **Translations**
    - Dutch translation
    - Swedish translation
    - German translation
- **Test**
    - Write tests with PHPunit
- **Contributing**
    - Write guides on how to contribute to the library
- **Code inteligence**
    - Implement more methods to validate code coverage
    - Add translations for the newer rules
- **General**
    - Make code more accessible for older versions of PHP
    - Work on implementation for several library's (Symphony, Laravel, Yii, CackePHP, etc..)

## Inspiration
This library took some heavy inspiration from some other libraries, I just wanted an easier and more
structured way to validate my `$_POST[]`. Since some other library's / packages weren't that structured and just stored 
all the rules / filters in one file I decided to build my own.

**Special thanks to:**
- https://github.com/Wixel/GUMP
- https://github.com/davidecesarano/Validation


## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email mikevandiepen@mediadevs.nl instead of using the issue tracker.

## Credits

- [Mike van Diepen](https://github.com/mikevandiepen)
- [All Contributors]()

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/mikevandiepen/advanced-form-helper.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/mikevandiepen/advanced-form-helper/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/mikevandiepen/advanced-form-helper.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/mikevandiepen/advanced-form-helper.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/mikevandiepen/advanced-form-helper.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/mikevandiepen/advanced-form-helper
[link-travis]: https://travis-ci.org/mikevandiepen/advanced-form-helper
[link-scrutinizer]: https://scrutinizer-ci.com/g/mikevandiepen/advanced-form-helper/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/mikevandiepen/advanced-form-helper
[link-downloads]: https://packagist.org/packages/mikevandiepen/advanced-form-helper
[link-author]: https://github.com/mikevandiepen
[link-contributors]: ../../contributors
