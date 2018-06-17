<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<input type="text" name="name" placeholder="Enter your name.">
		<input type="submit" value="send">
	</form>
	<?php
		if (isset($_POST['name'])) {
			$_SESSION['name'] = $_POST['name'];
			header('Location:next.php');
		} 
	?>
</body>
</html>