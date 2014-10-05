<?php

require_once('./src/marienfressinaud/lib_opml.php');

class TestRender extends PHPUnit_Framework_TestCase {
    public function test_lib_opml_render_minimal() {
        $str = libopml_render(array(
        	'body' => array(
        		array('text' => 'test')
        	)
        ));

        $expected = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<opml version="2.0">
  <head/>
  <body>
    <outline text="test"/>
  </body>
</opml>

XML;

        $this->assertEquals($str, $expected);
    }
}
