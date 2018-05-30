<?php
	session_start();
	if (!empty($_SESSION['name'])) {
		$name = $_SESSION['name'];
		echo "welcome $name";
	} else {
		header('Location:index.php');	
	}
?>