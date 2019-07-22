<?php
class CreateDB_model extends Model {
    public function createTables() {
    	$sql = "CREATE TABLE countries (
				country_id INT(6) AUTO_INCREMENT, 
				country VARCHAR(30) NOT NULL,
				country_code VARCHAR(2) NOT NULL,
				PRIMARY KEY (country_id)); ";
		$sql .= "CREATE TABLE postcodes (
				postcode_id INT(6) AUTO_INCREMENT NOT NULL, 
				postcode VARCHAR(30) NOT NULL,
				PRIMARY KEY (postcode_id)); ";
		$sql .= "CREATE TABLE places (
				id INT(6) AUTO_INCREMENT, 
				place name VARCHAR(60) NOT NULL,
				latitude VARCHAR(30) NOT NULL,
				longitude VARCHAR(30) NOT NULL,
				country_id INT(6),
				postcode_id INT(6),
				PRIMARY KEY (id),
				FOREIGN KEY (country_id) REFERENCES countries(country_id),
				FOREIGN KEY (postcode_id) REFERENCES postcodes(postcode_id));";
				$this->_conn->query($sql);
    }
}
	