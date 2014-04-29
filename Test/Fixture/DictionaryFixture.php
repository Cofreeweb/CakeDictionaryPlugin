<?php
/**
 * DictionaryFixture
 *
 */
class DictionaryFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 4, 'key' => 'primary'),
		'node' => array( 'type' => 'string', 'null' => false, 'key' => 'index'),
		'text' => array( 'type' => 'text', 'null' => false),
		'domain' => array( 'type' => 'string', 'length' => 50, 'null' => true),
		'references' => array( 'type' => 'text', 'null' => true),
		'msgid_plural' => array( 'type' => 'boolean', 'null' => true),
		'created' => array( 'type'=>'datetime', 'null' => true),
    'modified' => array( 'type'=>'datetime', 'null' => true),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'node' => array('column' => 'node', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'node' => 'Lorem ipsum dolor sit amet',
			'text' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'domain' => 'default',
			'references' => null,
			'msgid_plural' => 0,
			'created' => '2014-04-21 17:04:42',
			'modified' => '2014-04-21 17:04:42'
		),
	);

}
