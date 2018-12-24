<?php
require("db/db.php");

$result = mysqli_query($con, "SELECT * FROM logs ORDER BY id DESC LIMIT 0, 10");
while($row=mysqli_fetch_array($result)){
	
	echo "<span class='uname'>" . $row['username'] . "</span>: <span class='msg'>" . $row['msg'] . "</span></br></br>";
}
mysqli_close($con);
?>