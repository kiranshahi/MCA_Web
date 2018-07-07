<?php

	$id = $_POST['id'];
	
	$servername = "localhost";
	$dbname = "mca";
	$username = "root";
	$password = "";
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

	$sql = $conn->prepare("DELETE FROM users WHERE ID = :id");
	$sql->bindParam(':id', $id);
	$sql->execute();

?>