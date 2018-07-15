<?php
	
	require_once('db.php');

	function getAll() {
		$connection = dbCon();
		$sql = $connection->prepare("SELECT * FROM cds");
		$sql->execute();
		$results = $sql->fetchAll();

		foreach ($results as $result) {
			echo "<tr>";
			echo "<td>{$result["ID"]}</td>";
			echo "<td>{$result["Title"]}</td>";
			echo "<td>{$result["Artist"]}</td>";
			echo "<td>{$result["Price"]}</td>";
			echo "<td>{$result["Year"]}</td>";
			echo "<td>	<a href='edit.php?id={$result["ID"]}'>Edit</a> | <a href='delete.php?id={$result["ID"]}'>Delete</a></td>";
			echo "</tr>";
		}
	}

?>

<html>
<head>
	<title>List demo</title>
</head>
<body>
	<table>
		<?php getAll(); ?>
	</table>
	<a href="/mca1/index.php">Add New item</a>
</body>
</html>