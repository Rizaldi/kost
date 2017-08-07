<?php

class Koneksi {

	private $host = "localhost";
	private $user = "root";
	private $pass = "";
	private $dbname = "kost";
	private $db_connection = null;
	
	public function getConnection() {
		$this->db_connection = new mysqli($this->host, $this->user, $this->pass, $this->dbname);	
		if ($this->db_connection->connect_errno) {
			echo "Failed to connect to Database: (" . $this->db_connection->connect_errno . ") " . $this->db_connection->connect_error;
		} else {
			return $this->db_connection; 
		}
	}
	
}