<?php

class Controller extends SQLQuery{	
	function loadview($filename,$data=[]){
        $template=new Template();
        $class=get_class($this);
        $template->render($class,$filename,$data);
    }
 
	function load_model($modelname){
	    $this->$modelname=new $modelname;
	}

}
