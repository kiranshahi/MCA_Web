<!DOCTYPE html>
<html>
<head>
	<title>Users List</title>
	<script src="jquery-3.3.1.min.js"></script>
</head>
<body>
<table>
	<tbody>

<?php
	$servername = "localhost";
	$dbname = "mca";
	$username = "root";
	$password = "";
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

	$sql = $conn->prepare("SELECT * FROM users");
	$sql->execute();
	$results = $sql->fetchAll();
	foreach($results as $result) {
		echo "<tr>";
		echo "<td>{$result["ID"]}</td>";
		echo "<td>{$result["name"]}</td>";
		echo "<td>{$result["address"]}</td>";
		echo "<td>{$result["contact"]}</td>";
		echo "<td><a class='delete' href='#' data-id={$result["ID"]}>Delete</a></td>";
		echo "</tr>";
	}
?>
</tbody>
</table>
<br/>
<a href='/mca'>Add new</a>
<script type="text/javascript">
	$(document).ready(function () {
		$(".delete").on('click',function (e) {
			e.preventDefault();
			$(this).closest('tr').remove();
			$.post("delete.php", { 'id': $(this).attr('data-id') }, function (data) {
        });
    });
});
</script>

</body>
</html>