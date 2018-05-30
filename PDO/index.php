<?php
	$server = "localhost";
	$user = 'root';
	$pass = '';
	$db = 'test';

	# Connection string for PDO
	$dsn = "mysql:host=$server; dbname = $db";
	

	$pdo = new PDO($dsn, $user, $pass);
	
	$query = "SELECT * FROM users";
	$st = $pdo->prepare($query);
	$st -> execute();
	$records = $st -> fetchAll();
	print_r($records);
?>