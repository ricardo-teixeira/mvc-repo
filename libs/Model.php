<?php

class Model {

	function __construct() {
		try {
			$this->db = new Database();
		} catch (Exception $e) {
			echo "Could not connect to database.";
			exit;
		}
		
	}

}