<?php
App::uses('DictionaryAppModel', 'Dictionary.Model');
/**
 * Dictionary Model
 *
 */
class Dictionary extends DictionaryAppModel 
{
  public $actsAs = array(
      'Translate' => array(
          'text' => 'Texts'
      )
  );
  
  public $all = false;
  
/**
 * Toma todos los nodos y crea un array donde las claves son el md5 del texto original
 *
 * @return array
 */
  public function getAll()
  {    
    $result = Cache::read( 'Dictionaries', 'dictionaries');
    
    if( !$result)
    {
      $records = $this->find( 'all', array(
          'fields' => array(
              'Dictionary.node',
              'Dictionary.text',
              'Dictionary.domain'
          )
      ));
      
      $result = Hash::combine( $records,  '{n}.Dictionary.node', '{n}.Dictionary.text', '{n}.Dictionary.domain');
      Cache::write( 'Dictionaries', $records, 'dictionaries');
    }
    
    return $result;
  }
  
/**
 * Añade un nodo 
 * Los parámetros son los mismos que I18n
 *
 * @param string $text 
 * @param string $domain 
 * @param array $references 
 * @param string $msgid_plural 
 * @return void
 */
  public function add( $text, $domain = 'default', $references = array(), $msgid_plural = false)
  {
    $node = $this->getCrypt( $text);
    
    $record = $this->find( 'first', array(
        'conditions' => array(
            'Dictionary.node' => $node
        )
    ));
    
    if( $record)
    {
      return $record;
    }
    
    foreach( Configure::read( 'Config.languages') as $locale)
    {
      $texts [$locale] = $text;
    }
    
    $data = array(
        'node' => $node,
        'text' => $texts,
        'domain' => $domain,
        'msgid_plural' => $msgid_plural,
        'references' => json_encode( $references)
    );
    
    $this->create();
        
    if( $this->saveAll( $data))
    {    
      $record = $this->find( 'first', array(
          'conditions' => array(
              'Dictionary.node' => $node
          )
      ));
      
      return $record;
    }
    
    return false;
  }
  
/**
 * Toma un nodo dado un texto y un domain
 *
 * @param string $text 
 * @param string $domain 
 * @return void
 */
  public function get( $text, $domain = 'default')
  {
    $records = $this->getAll();
    $node = $this->getCrypt( $text);
    
    if( isset( $this->all [$domain][$node]))
    {
      return $this->all [$domain][$node];
    }
    
    return $text;
  }
  
/**
 * Devuelve el md5 del texto
 *
 * @param string $text 
 * @return void
 */
  public function getCrypt( $text)
  {
    return md5( $text);
  }

}
