<?php
App::uses('DictionaryAppController', 'Dictionary.Controller');
/**
 * Dictionaries Controller
 *
 */
class DictionariesController extends DictionaryAppController 
{
  public $uses = array( 'Dictionary.Dictionary');
  
  public $components = array( 'Paginator');
  
  public function admin_index( $domain)
  {
    $this->paginate = array(
		    'Dictionary' => array(
		        'conditions' => array(
		            'Dictionary.domain' => $domain
		        ),
		        'paramType' => 'querystring'
		    )
		);
		
		$nodes = $this->Paginator->paginate( 'Dictionary');

		$this->set( array(
		    'nodes' => $nodes,
		    'paging' => $this->request->params ['paging']['Dictionary'],
		    '_serialize' => array(
		        'nodes',
		        'paging'
		    )
		));
  }
  
  public function admin_edit( $node)
  {
    if( $this->request->is( 'post', 'put'))
    {
      $this->Dictionary->create();

      if( $this->Dictionary->saveAll( $this->request->data))
      {        
        $this->set( 'success', true);
        $this->set( '_serialize', array( 'success'));
      }
    }
    else
    {
      $dictionary = $this->Dictionary->find( 'first', array(
          'conditions' => array(
              'Dictionary.node' => $node
          )
      ));
      
      $this->set( array(
  		    'dictionary' => $dictionary,
  		    '_serialize' => array(
  		        'dictionary',
  		    )
  		));
    }
  }

}
