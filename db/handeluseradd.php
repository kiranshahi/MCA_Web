<?php
	
	$pdo = new PDO("mysql:host=localhost; dbhost=test", "root", "");
	$fulllname = $_POST["fulllname"];
	$username = $_POST["username"];
	$email = $_POST["email"];
	$password = $_POST["password"];

	$sql = "INSERT INTO users(fulllname, username, email, password) values(:fulllname, :username, :email, :password)";
	$st -> $pdo -> prepare($sql),
	$st -> bindParam("fulllname", $fulllname);
	$st -> bindParam("username", $username);
	$st -> bindParam("email", $email);
	$st -> bindParam("password", $password);

	$st -> execute();

	echo "User added successfully.";

?>