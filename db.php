<?php
			$servername = "localhost";
			$dbname = "mca";
			$username = "root";
			$password = "";
			$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

			$sql = $conn->prepare("INSERT INTO users (name, address, contact) VALUES (:name,:address,:contact)");

			$sql->bindParam(':name', $_POST['name']);
			$sql->bindParam(':address', $_POST['address']);
			$sql->bindParam(':contact', $_POST['contact']);
			$insertRow= $sql->execute();

			if ($insertRow > 0) {
				header("Location: list.php");
			} else {
				echo "Something went wrong";
			}

?>