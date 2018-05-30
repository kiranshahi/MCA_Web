<?php
	$controller =! empty($_GET["Controller"]) ? $_GET["Controller"]: 'index';
	$action =! empty($_GET["action"]) ? $_GET["action"]: 'index';

	require_once("controller/{$controller}Controller.php");

	$class = $controller.'controller';
	$object = new $class();
	$object -> $action();
?>