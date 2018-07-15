<?php

	function dbCon( ) {
		try {
			$con = new PDO("mysql:host=localhost; dbname=cds", "root", "");
			return $con;	
		} catch (Exception $e) {
			print_r($e);
		}
	}

?>