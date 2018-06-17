<?php
	
	$title = "This is the title";
	$artist = "Artist 1";
	$price = "100";
	$year = "2018-01-01";
			
	/**
	* Function for database connection using PDO class
	**/
	function dbCon() {
		try {
			$servername = "localhost";
			$username = "root";
			$password = "";
			$conn = new PDO("mysql:host=$servername;dbname=mca", $username, $password);
			return $conn;
		} catch(PDOException $e) {
			echo "Connection failed: " . $e->getMessage();
		}
	}
	
	/**
	* Insert operation to MySql database using prepared statement of PDO class
	* insert() function takes $title (string), $artist (string), $price (string) and $year(datetime (1999-01-0)) as parameter.
	**/
	function insert($title,$artist,$price,$year) {
		try {
			$conn = dbCon();
			$sql = $conn->prepare("INSERT INTO cds (title, artist, price, year) VALUES (:title,:artist,:price,:year)");
			$sql->bindParam(':title', $title);
			$sql->bindParam(':artist', $artist);
			$sql->bindParam(':price', $price);
			$sql->bindParam(':year', $year);
			$insertRow= $sql->execute();
			echo "$insertRow row inserted";
		} catch(PDOException $e) {
			echo "Something went wrong";
			}
		}
		
		/**
		* Function to delete the all records from database.
		**/
		function delete() {
			$conn = dbCon();
			$sql = $conn->prepare("DELETE FROM cds");
			$sql->execute();
			echo "Deleted successfully";
		}
		
		/**
		* Function to update the records.
		* Values need to be updated is required to be supplied as parameter. If value is not change then old value need to be passed else it will store null
		* in database
		**/
		function update($title,$artist,$price,$year) {
			$conn = dbCon();
			$sql = $conn->prepare("UPDATE cds SET title=:title, artist=:artist, price=:price, year=:year");
			$sql->bindParam(':title', $title);
			$sql->bindParam(':artist', $artist);
			$sql->bindParam(':price', $price);
			$sql->bindParam(':year', $year);
			echo "Updated successfully";
		}
		
		/**
		* Function to get all the records form database.
		* fetchAll() function will fetch all the records from database as an associative array and fetch() will fetch only one record from database.
		* {variableName} is an string interpolation in php.  It provides a way to embed a variable, an array value, 
		* or an object property in a string with a minimum of effort.
		**/
		function getCds() {
			$conn = dbCon();
			$sql = $conn->prepare("SELECT * FROM cds");
			$sql->execute();
			$results = $sql->fetchAll();
			foreach($results as $result) {
				echo "<tr>";
				echo "<td>{$result["id"]}</td>";
				echo "<td>{$result["title"]}</td>";
				echo "<td>{$result["artist"]}</td>";
				echo "<td>{$result["price"]}</td>";
				echo "<td>{$result["year"]}</td>";
				echo "</tr>";
			}
		}
		
		/** 
		* Function to delete record by id
		**/
		function deletById($id) {
			$conn = dbCon();
			$sql = $conn->prepare("DELETE FROM cds WHERE id=:id");
			$sql->bindParam(':id', $id);
			$sql->execute();
			echo "Deleted successfully";
		}
		
		//insert($title,$artist,$price,$year);
		
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
	<table>
    	<thead>
        	<tr>
            	<th>
                	ID
                </th>
                <th>
                	Title
                </th>
                <th>
                	Artist
                </th>
                <th>
                	Price
                </th>
                <th>
                	Year
                </th>
            </tr>
        </thead>
        <tbody>
        <?php getCds(); ?>
        </tbody>
	</table>
</body>
</html>
