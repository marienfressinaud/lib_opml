# lib_opml

lib_opml is a free library to manage OPML format in PHP.
It takes in consideration only version 2.0 (http://dev.opml.org/spec2.html).
Basically it means ```text``` attribute for outline elements is required.

lib_opml requires SimpleXML (http://php.net/manual/en/book.simplexml.php)

* Author: Marien Fressinaud <dev@marienfressinaud.fr>
* Url: https://github.com/marienfressinaud/lib_opml
* Version: 0.1
* Date: 2014-03-29
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

If parsing fails for any reason (e.g. not an XML string, does not match with
the specifications), a ```LibOPML_Exception``` is raised.

See ```index.php``` for concrete examples.
