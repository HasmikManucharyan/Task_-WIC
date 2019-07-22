<?php

class SQLQuery {
    protected $_conn;
    protected $_result;

    function __construct() {

        $this->connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
       
    }

    function connect($host, $login, $password, $base) {
      try {
            $this->_conn = new PDO("mysql:host=$host;dbname=$base", $login, $password);
            $this->_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      }
      catch(PDOException $e)
      {
          die("Connection failed: " . $e->getMessage());
      }

    }

    /** Disconnects from database **/

    function disconnect() {
      $this->_conn= null;
    }
  


    // /** Get number of rows **/
    // function getNumRows() {
    //     return mysqli_num_rows($this->_result);
    // }

    // /** Free resources allocated by a query **/

    // function freeResult() {
    //     mysqli_free_result($this->_result);
    // }

    // function get_last_insert_id() {
    //     return mysqli_insert_id($this->_conn);
    // }
    // /** Get error string **/

    // function getError() {
    //     return mysqli_error($this->_conn);
    // }
}
