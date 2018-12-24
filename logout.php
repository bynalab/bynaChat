<?php
	session_start();
	
	session_destroy();
	$user = $_SESSION['username'];
	$message = " $user logged out!";
	header("location: index.php?message=$message");
?>