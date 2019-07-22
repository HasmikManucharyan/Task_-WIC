<?php

class Main extends Controller {
	public function __construct(){
        parent::__construct();
        $this->load_model('main_model');        
        $this->load_model('createDB_model');        
	}

	function index(){
	    // $this->createDB_model->createTables();
	    $data['data']=$this->main_model->get_countries();
        $this->loadview('main',$data);
    }
	
	public function checkCode(){
		$data['country_code'] = $_POST['country_code'];
		$data['zipcode'] = $_POST['zipcode'];
		$places = $this->main_model->check_code($data);
		print_r(json_encode($places));
	}

	public function insertPlace(){
		$data['zipcode'] = $_POST['zipcode'];
		$data['places'] = json_decode($_POST['places']);
		$data['country_id'] = $_POST['country_id'];
		$places = $this->main_model->insertPlace($data);
		print_r($places);
	}
}
