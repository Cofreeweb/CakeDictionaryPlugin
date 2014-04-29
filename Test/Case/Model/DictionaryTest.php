<?php
App::uses( 'Dictionary', 'Dictionary.Model');
App::uses( 'Dictionary', 'Dictionary.Model');

/**
 * Dictionary Test Case
 *
 */
class DictionaryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.dictionary.dictionary',
    // 'plugin.i18n.i18n',
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() 
	{
		parent::setUp();
		$this->Dictionary = ClassRegistry::init( 'Dictionary.Dictionary');
		$this->__addData();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Dictionary);

		parent::tearDown();
	}
	
	private function __addData()
	{
	  Configure::write( 'Config.languages', array( 'spa', 'eus'));
	  
	  $result = $this->Dictionary->add( 'Hola amigos');
	  $result = $this->Dictionary->add( 'Adiós colegas');
	  
	  $result = $this->Dictionary->add( 'Añadir', 'admin');
	  $result = $this->Dictionary->add( 'Crear', 'admin');
	}
	
	public function testAddMulti()
	{  
	  $text = Translator::get( 'Adiós colegas');
	  $text = $this->Dictionary->get( 'Adiós colegas');
	  $this->assertEqual( $text, 'Adiós colegas');
	}
		
}
