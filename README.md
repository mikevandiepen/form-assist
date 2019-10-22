### Installation

###### Github
````shell script
$ git clone https://mikevandiepen@bitbucket.org/mikevandiepen/advanced-form-helper.git
````

###### Composer
```shell script
$ composer install mikevandiepen/advanced-form-helper
```


#### Sanitization
```php
Form::sanitize($_POST, [
    'name'  => 'sql|xss|trim',
    'email' => 'sql|xss|trim|email',
], $mysqli_connection /** optional, we recommend using prepared statements */);
```

### Sanitization filters
* `sql`
* `xss`
* `email`
* `url`
* `numbers`
* `float`
* `json_encode`
* `encode_json`
* `json_decode`
* `decode_json`
* `trim`
* `trim_all`
* `ltrim`
* `left_trim`
* `trim_left`
* `rtrim`
* `right_trim`
* `trim_right`
* `upper`
* `uppercase`
* `lower`
* `lowercase`
* `slug`
* `slugify`
* `to_slug`
* `tags`
* `strip_tags`

### Validation rules
| rule | functionality | 
|:---|:---|
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