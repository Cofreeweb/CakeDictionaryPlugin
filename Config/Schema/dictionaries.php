<?php

class DictionariesSchema extends CakeSchema {
	public $name = 'Dictionaries';

	public function before($event = array()) {
		return true;
	}

	public function after($event = array()) {
	}


  public $dictionaries = array(
			'id' => array( 'type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 4, 'key' => 'primary'),
			'node' => array( 'type' => 'string', 'null' => false, 'key' => 'index'),
			'text' => array( 'type' => 'text', 'null' => false),
			'domain' => array( 'type' => 'string', 'length' => 50, 'null' => true),
			'references' => array( 'type' => 'text', 'null' => true),
			'msgid_plural' => array( 'type' => 'boolean', 'null' => true),
			'created' => array( 'type'=>'datetime', 'null' => true),
      'modified' => array( 'type'=>'datetime', 'null' => true),
			'indexes' => array(
  			'PRIMARY' => array('column' => 'id', 'unique' => 1),
  			'node' => array('column' => 'node', 'unique' => 0),
  		),
  );
  
  
}
?>