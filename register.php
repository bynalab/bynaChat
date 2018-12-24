<html>
<head>
<link href="css/reset.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css">

<title>Byna Chat</title>
</head>
<body>
<div id="container">
	<div class="header">
		<h1>BYNACHAT</h1>
	</div>

    <h2>Sign Up Here...</h2>
    <h4>
    	<form method="post" action="">
        <input type="text" name="username" placeholder="Username" style="width:250px;"></br>
        <input type="password" name="password" placeholder="Password" style="width:250px";></br>
        <input type="password" name="confirm" placeholder="Confirm Password" style="width:250px";></br>
        <input type="submit" name="submit" value="Submit">
        <a href="index.php">Go to login page...</a>
        </form>
    </h4>

</div>
<?php

if(isset($_POST['submit'])){
	
	require("db/db.php");
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	$confirm = $_POST['confirm'];
	
	if($password != $confirm){
		$message = "Password not much !";
		header("location: index.php?message1=$message");
	}else{
		$check = mysqli_query($con, "SELECT * FROM login WHERE username='$username'");
		if(mysqli_num_rows($check)){
			$message = "Username already exist.";
			header("location: index.php?message1=$message");
		}else{
			mysqli_query($con, "INSERT INTO login(username, password) VALUES('$username', '$password')");
			$message = "You have successfully registered. Sign in now.";
			header("location: index.php?message1=$message");
		}
	}
}
?>

</body>
</html>