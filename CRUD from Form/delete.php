<?php 

require_once('db.php');
	
	if (isset($_GET['id'])){
		$id =$_GET['id'];
		$connection = dbCon();
		$sql = $connection->prepare("DELETE FROM cds WHERE ID = :id");
		$sql->bindParam(':id', $id);
		$sql->execute();
		header("Location: list.php");
	}
?>