<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<title>libopml.php samples</title>
	</head>
	<body>
<?php

include('lib_opml.php');


echo '<h1>Test libopml_parse_file</h1>';
$filename = 'my_opml_file.xml';
try {
	$opml_array1 = libopml_parse_file($filename);
	echo '<pre>';
	print_r($opml_array1);
	echo '</pre>';
} catch (LibOPML_Exception $e) {
	echo $e;
}


echo '<h1>Test libopml_parse_string</h1>';
$opml_string = <<<XML
<?xml version="1.0" encoding="UTF-8" ?>
<opml version="2.0">
	<head>
	</head>
	<body>
<outline text="A" />
<outline text="Simple" />
<outline text="OPML" />
<outline text="String" />
	</body>
</opml>
XML;
try {
	$opml_array2 = libopml_parse_string($opml_string);
	echo '<pre>';
	print_r($opml_array2);
	echo '<pre>';
} catch (LibOPML_Exception $e) {
	echo $e->getMessage();
	print_r($e);
}


echo '<h1>Test libopml_render</h1>';
try {
	$opml_string = libopml_render($opml_array1);
	echo '<pre>';
	echo htmlentities($opml_string);
	echo '<pre>';
} catch (LibOPML_Exception $e) {
	echo $e->getMessage();
}
?>

	</body>
</html>
