<form ng-submit="submit()">
  <?= $this->Form->input( 'Dictionary.text', array(
      'type' => 'textarea',
      'ng-model' => 'dictionary.Dictionary.text',
      'multilingue' => true,
      'label' => __d( 'admin', 'Texto'),
  )) ?>
  
  <input type="submit" id="submit" value="Submit" />
</form>