<?php
$con = mysqli_connect("localhost","username","password","bynaChat");
		// Check connection
		if (mysqli_connect_errno())
		  {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		  }
?>