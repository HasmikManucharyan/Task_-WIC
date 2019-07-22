<?php
define('ROOT', dirname(dirname(__FILE__)).'/mvc_wic');
define('BASE_URL', 'http://mvcwic/');
require_once (ROOT.'/config/config.php');
if(isset($_GET['url']))
    $url = $_GET['url'];
function callRequest() {
	global $url;

	$urlArray = array();
	$urlArray = explode("/",$url);
	 $controller=DEFAULT_CONTROLLER;

       $action=DEFAULT_ACTION;
       $queryString=array();

    if(!empty($urlArray[0])){
	    $controller = $urlArray[0];
	    array_shift($urlArray);
	    if(!empty($urlArray[0]))
	  	    $action = $urlArray[0];
	  	 
	    array_shift($urlArray);
	    $queryString = $urlArray;
    }
   
   
	$dispatch = new $controller();
	
	if ((int)method_exists($controller, $action)) {
		call_user_func_array(array($dispatch,$action),$queryString);
	} else {
		echo $controller.'<br>';
		echo $action.'<br>';die;
		die("***MYMVC*** No such file or directory *****");
	}
}

/** Autoload any classes that are required **/

function __autoload($className) {
	if (file_exists(ROOT . "/library/$className.class.php")) {
		require_once(ROOT . "/library/$className.class.php");
	} else if (file_exists(ROOT . "/application/controllers/$className.php")) {
		require_once(ROOT . "/application/controllers/$className.php");
	} else if (file_exists(ROOT . "/application/models/$className.php")) {
		require_once(ROOT . "/application/models/$className.php");
	} else {
		die("***MYMVC*** No such file or directory");
	}
}


callRequest();

