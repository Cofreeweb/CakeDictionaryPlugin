<?php

App::uses('File', 'Utility');

class Translator
{
  public static $nodes = array();
  
  public static function build()
  {
    self::$nodes = ClassRegistry::init( 'Dictionary.Dictionary')->getAll();
  }
  
  public static function get( $text, $domain = 'default')
  {
    if( empty( self::$nodes))
    {
      self::build();
    }
    else
    {

    }
    
    $node = self::getNode( $text);
    
    if( $result = Hash::get( self::$nodes, $domain .'.'. $node))
    {
      return $result;
    }

    return $text;
  }
  
  public static function getNode( $text)
  {
    return md5( $text);
  }
}