# lib_opml

lib_opml is a free library to manage OPML format in PHP.

By default, it takes in consideration version 2.0 but can be compatible with
OPML 1.0. More information on http://dev.opml.org.

Difference is "text" attribute is optional in version 1.0. It is highly
recommended to use this attribute.

lib_opml requires SimpleXML (php.net/simplexml) and DOMDocument (php.net/domdocument)

* Author: Marien Fressinaud <dev@marienfressinaud.fr>
* Url: https://github.com/marienfressinaud/lib_opml
* Version: 0.2
* License: public domain

## Usages
```php
include('lib_opml.php');
$filename = 'my_opml_file.xml';
$opml_array = libopml_parse_file($filename);
print_r($opml_array);
```

```php
$opml_string = [...];
$opml_array = libopml_parse_string($opml_string);
print_r($opml_array);
```

```php
$opml_array = [...];
$opml_string = libopml_render($opml_array);
$opml_object = libopml_render($opml_array, true);
echo $opml_string;
print_r($opml_object);
```

You can set $strict argument to false if you want to bypass "text" attribute
requirement.

If parsing fails for any reason (e.g. not an XML string, does not match with
the specifications), a ```LibOPML_Exception``` is raised.

See ```index.php``` for concrete examples.

lib_opml array format is described here:

```php
$array = array(
    'head' => array(       // 'head' element is optional (but recommended)
        'key' => 'value',  // key must be a part of available OPML head elements
    ),
    'body' => array(              // body is required
        array(                    // this array represents an outline (at least one)
            'text' => 'value',    // 'text' element is required if $strict is true
            'key' => 'value',     // key and value are what you want (optional)
            '@outlines' = array(  // @outlines is a special value and represents sub-outlines
                array(
                    [...]         // where [...] is a valid outline definition
                ),
            ),
        ),
        array(                    // other outline definitions
            [...]
        ),
        [...],
    )
)
```
