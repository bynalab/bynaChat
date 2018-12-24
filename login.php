<?php
session_start();
$username = $_POST['username'];
$password = $_POST['password'];

require("db/db.php");

$result = mysqli_query($con, "SELECT * FROM login WHERE username='$username' AND password='$password'");
if(mysqli_num_rows($result)){
	$res = mysqli_fetch_array($result);
	$_SESSION['username'] = $res['username'];
	header("location: index.php?username=$username");
}else{
	$message = "No username found !";
	header("location: index.php?message=$message");
	}
?>