### Installation

###### Github

```shell script
$ git clone https://mikevandiepen@bitbucket.org/mikevandiepen/advanced-form-helper.git
```

###### Composer

```shell script
$ composer install mikevandiepen/advanced-form-helper
```

#### Sanitization

```php
<?php 
mikevandiepen\utility\Form::sanitize($_POST, [
    'name'  => 'sql|xss|trim',
    'email' => 'sql|xss|trim|email',
], $mysqli_connection /** optional, we recommend using prepared statements */);
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
| `exact_length` |  | 
| `minlen` / `min_length` |  | 
| `maxlen` / `max_length` |  | 
| `email` |  | 
| `url` |  | 
| `domain` |  | 
| `ip` / `ip_address` |  | 
| `mac` / `mac_address` |  | 
| `between` |  | 
| `min` / `minimum` |  | 
| `max` / `maximum` |  | 
| `equal` / `equals` / `equal_to` / `equals_to` |  | 
| `not_equal` / `not_equal_to` |  |  
| `gt` / `greater_than` |  | 
| `gte` / `greater_than_or_equal_to` |  | 
| `lt` / `less_than` |  | 
| `lte` / `less_than_or_equal_to` |  | 
| `allowed_extensions` |  | 
| `allowed_mime_types` |  | 
| `max_size` / `max_file_size` |  | 
| `allowed_providers` / `allowed_email_providers` |  | 
| `blocked_providers` / `blocked_email_providers` |  |  