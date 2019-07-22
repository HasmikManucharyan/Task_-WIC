<?php
class Main_model extends Model {
  	public function get_countries(){
        $query="SELECT * FROM countries";
        return $this->_conn->query($query,PDO::FETCH_ASSOC)->fetchAll();      
    }

    public function check_code($data) {
      $query="SELECT places.`places` FROM places INNER JOIN postcodes on places.`postcode_id`=postcodes.`postcode_id` INNER JOIN countries on countries.`country_id`=places.`country_id` WHERE countries.`country_code` = '".$data['country_code']."' and postcodes.`postcode`='".$data['zipcode']."'";
        return $this->_conn->query($query,PDO::FETCH_ASSOC)->fetchAll();
    }

    public function insertPlace($data){
        $zipcode = $data['zipcode'];
        $places = json_encode($data['places']);
        $country_id = $data['country_id'];
        $query ="INSERT INTO postcodes (`postcode`) VALUES ('".$zipcode."');";
        $this->_conn->query($query);
        $query = "SELECT `postcode_id` FROM postcodes ORDER BY `postcode_id` DESC LIMIT 1;";
        $last_id = $this->_conn->query($query,PDO::FETCH_ASSOC)->fetchAll()[0]['postcode_id'];
        $query .="INSERT INTO places (places, country_id, postcode_id) VALUES ('".$places."', ".$country_id.", ".$last_id.");";
        $this->_conn->query($query);
        return $places;
    }
}
	