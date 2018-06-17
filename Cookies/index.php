<?php
	if (isset($_COOKIE['visitcount'])) {
		$count = $_COOKIE['visitcount'];
		setcookie('visitcount', $count + 1 , time() + 36000);
		$newCount = $count + 1;
		echo "You have visited this page $newCount times.";
	} else {
		setcookie('visitcount', 0 , time() + 3600);
		echo "Cookie set bhayo";
	}
?>