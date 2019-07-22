<?php

/** Configuration Variables **/


define('DB_NAME', 'task_wic');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_HOST', 'localhost');

define('DEFAULT_CONTROLLER','main');
define('DEFAULT_ACTION','index');

/** functions **/
function base_url($url=""){
    if($url)
	 return BASE_URL."/$url";
	 return BASE_URL;
}
function redirect($url=""){
	$url=base_url($url);
    header("location:$url");
    die;
}
