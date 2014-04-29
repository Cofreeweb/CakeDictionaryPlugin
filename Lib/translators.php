<?php




function __( $singular, $args = null) 
{
	if (!$singular) {
		return;
	}
  
	$translated = Translator::get( $singular);
	
	if ($args === null) {
		return $translated;
	} elseif (!is_array($args)) {
		$args = array_slice(func_get_args(), 1);
	}
	return vsprintf($translated, $args);
}


function __d($domain, $msg, $args = null) {
	if (!$msg) {
		return;
	}

	$translated = Translator::get( $msg, $domain);
	
	if ($args === null) {
		return $translated;
	} elseif (!is_array($args)) {
		$args = array_slice(func_get_args(), 2);
	}
	return vsprintf($translated, $args);
}