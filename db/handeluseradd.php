<?php
	
	$pdo = new PDO("mysql:host=localhost; dbname=test", "root", "");
	$fulllname = $_POST["fullname"];
	$username = $_POST["username"];
	$email = $_POST["email"];
	$password = $_POST["password"];

	$sql = "INSERT INTO users(Fulllname, Username, Email, Password) VALUES (:fulllname, :username, :email, :password)";
	$st = $pdo -> prepare($sql);
	$st -> bindParam("fulllname", $fulllname);
	$st -> bindParam("username", $username);
	$st -> bindParam("email", $email);
	$st -> bindParam("password", $password);

	$st -> execute();

	echo "User added successfully.";

?>