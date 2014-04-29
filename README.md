Dictionary
==========


## Install

in index.php, test.php after 
if (!defined('APP_DIR')) {
	define('APP_DIR', basename(dirname(dirname(__FILE__))));
}

add 
require ROOT . DS . APP_DIR . DS . 'Plugin' . DS . 'Dictionary' . DS . 'Lib' . DS . 'translators.php';





## Console

bin/cake Dictionary.extract_nodes execute