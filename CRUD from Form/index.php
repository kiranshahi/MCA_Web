<?php

	require_once('db.php');

	function insert($title, $artist, $price, $year) {

		$connection = dbCon();
		$sql = $connection->prepare("INSERT INTO cds (Title, Artist, Price, Year) VALUES(:title, :artist, :price, :year )");
		$sql->bindParam(':title', $title);
		$sql->bindParam(':artist', $artist);
		$sql->bindParam(':price', $price);
		$sql->bindParam(':year', $year);
		$insertedRow = $sql->execute();
		if ($insertedRow > 0) {
			header("Location: list.php");
		}
	}
	
	if (isset($_POST['title'])){
		$title = $_POST['title'];
		$artist = $_POST['artist'];
		$price = $_POST['price'];
		$year = $_POST['year'];

		insert($title, $artist, $price, $year);
	}

?>

<html>
<head>
	<title>Form Demo</title>
</head>
<body>
	<form method="post" action="">
		<div>
			<label for="title">Title</label>
			<input type="text" name="title" />
		</div>
		<div>
			<label>Artist</label>
			<input type="text" name="artist" />
		</div>
		<div>
			<label>Price</label>
			<input type="text" name="price" />
		</div>
		<div>
			<label>Year</label>
			<input type="text" name="year" />
		</div>
		<input type="submit" value="save">
	</form>
</body>
</html>