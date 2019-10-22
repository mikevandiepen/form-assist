### Disclaimer
This package is not fully tested and still in beta mode. It is also not available through composer yet.

### Installation
There are several ways of installing this package, we recommend the most (Safe) way which is through composer.

###### Manually using GIT
```shell script
$ git clone https://mikevandiepen@bitbucket.org/mikevandiepen/advanced-form-helper.git
```


###### Via composer
```shell script
$ composer install mikevandiepen/advanced-form-helper
```


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
|`sql` | | 
|`xss` | | 
|`email` | | 
|`url` | | 
|`numbers` | | 
|`float` | | 
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
| `regex` | Whether the value of the field matches the regular expression threshold pattern.  | 
| `exact_length` | Whether the value of the field matches the exact threshold length. | 
| `minlen` / `min_length` | Whether the value of the field has the minimal required threshold length. | 
| `maxlen` / `max_length` | Whether the value of the field has less then the maximal required threshold length. | 
| `email` | Whether the value of the field is an email. | 
| `url` | Whether the value of the field is an url.| 
| `domain` | Whether the value of the field is a domain name.| 
| `ip` / `ip_address` | Whether the value of the field is an IP address. | 
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