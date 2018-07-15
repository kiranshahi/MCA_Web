<?php
require_once('db.php');
	
	if (isset($_GET['id'])){
		$id =$_GET['id'];
		$result = getAll($id);
	} elseif (isset($_POST['title'])){
		$id = $_POST['id'];
		$title = $_POST['title'];
		$artist = $_POST['artist'];
		$price = $_POST['price'];
		$year = $_POST['year'];
		updateValue($id, $title, $artist, $price, $year);
	} else {
		header("Location: list.php");
	}
	

	function getAll($id) {
		$connection = dbCon();
		$sql = $connection->prepare("SELECT * FROM cds WHERE ID=:id");
		$sql->bindParam(":id", $id);
		$sql->execute();
		$result = $sql->fetch();
		return $result;
	}

	function updateValue($id, $title, $artist, $price, $year) {

		$connection = dbCon();
		$sql = $connection->prepare("UPDATE cds SET Title=:title, Artist=:artist, Price=:price, Year=:year WHERE ID=:id");
		$sql->bindParam(':id', $id);
		$sql->bindParam(':title', $title);
		$sql->bindParam(':artist', $artist);
		$sql->bindParam(':price', $price);
		$sql->bindParam(':year', $year);
		$sql->execute();
		header("Location: list.php");
	}
?>

<html>
<head>
	<title>Form Demo</title>
</head>
<body>
	<form method="post" action="<?=($_SERVER['PHP_SELF'])?>">
		<input type="hidden" name="id" value="<?php echo $result['ID']; ?>">
		<div>
			<label for="title">Title</label>
			<input type="text" name="title" value="<?php echo $result['Title']; ?>" />
		</div>
		<div>
			<label>Artist</label>
			<input type="text" name="artist" value="<?php echo $result['Artist']; ?>" />
		</div>
		<div>
			<label>Price</label>
			<input type="text" name="price" value="<?php echo $result['Price']; ?>" />
		</div>
		<div>
			<label>Year</label>
			<input type="text" name="year" value="<?php echo $result['Year']; ?>" />
		</div>
		<input type="submit" value="update">
	</form>
</body>
</html>