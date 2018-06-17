<?php
	
	$title = "This is the title";
	$artist = "Artist 1";
	$price = "100";
	$year = "2018-01-01";
			
	
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
		
		function delete() {
			$conn = dbCon();
			$sql = $conn->prepare("DELETE FROM cds");
			$sql->execute();
			echo "Deleted successfully";
		}
		
		function update($title,$artist,$price,$year) {
			$conn = dbCon();
			$sql = $conn->prepare("UPDATE cds SET title=:title, artist=:artist, price=:price, year=:year");
			$sql->bindParam(':title', $title);
			$sql->bindParam(':artist', $artist);
			$sql->bindParam(':price', $price);
			$sql->bindParam(':year', $year);
			echo "Updated successfully";
		}
		
		function getCds() {
			$conn = dbCon();
			$sql = $conn->prepare("SELECT * FROM cds");
			$sql->execute();
			$results = $sql->fetchAll();
			foreach($results as $result) {
				//print "<tr>";
				//print "<td>". $result["id"]. "</td>";
				//print "<td>". $result["title"]. "</td>";
				//print "<td>". $result["artist"]. "</td>";
				//print "<td>". $result["price"]. "</td>";
				//print "<td>". $result["year"]. "</td>";
				//print "</tr>";
				
				
				echo "<tr>";
				echo "<td>{$result["id"]}</td>";
				echo "<td>{$result["title"]}</td>";
				echo "<td>{$result["artist"]}</td>";
				echo "<td>{$result["price"]}</td>";
				echo "<td>{$result["year"]}</td>";
				echo "</tr>";
			}
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
