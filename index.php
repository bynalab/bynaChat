
<html>
<head>
<link href="css/reset.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css">
<title>Byna Chat</title>
<div id="container">
	<div class="header">
		<h1>BYNACHAT</h1>
	</div>
    
	<div class="main">
		<?php
            session_start();
                if(!isset($_SESSION['username'])){
        ?>
	<form name="form2" method="post" action="login.php">
		<?php 
            if(isset($_GET['message'])){ 
                $message = $_GET['message'];
                echo "<h3>$message</h3>";
            }
        ?>
    <h3>
    <table>
    <tr>
        <td><input type="text" name="username" placeholder="Username"></td>
        <td><input type="password" name="password" placeholder="Passwords"></td>
        <td><input type="submit" name="submit" value="Login"></td>
    </tr>
    </table>
    </h3>
 
	</form>

	<a href="register.php">Register</a>
            
    <?php 
            if(isset($_GET['message1'])){ 
                $message=$_GET['message1'];
                echo "<h5>$message</h5>";
            }
    ?>
	<?php 
        exit;
            
        }
    
    ?>

	<?php 
                if(isset($_GET['username'])){
                $_GET['username'];
                }
    ?>

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script>

	function submitchat(){
		if(form1.msg.value === ''){ //exit if one of the field is blank
			alert('Enter your message !');
			return;
		}
		var msg = form1.msg.value;
		var xmlhttp = new XMLHttpRequest(); //http request instance
		
		xmlhttp.onreadystatechange = function(){ //display the content of insert.php once successfully loaded
			if(xmlhttp.readyState===4&&xmlhttp.status===200){
				document.getElementById('chatlogs').innerHTML = xmlhttp.responseText; //the chatlogs from the db will be displayed inside the div section
			}
		};
		xmlhttp.open('GET', 'insert.php?msg='+msg, true); //open and send http request
		xmlhttp.send();
	}
	$(document).ready(function(e) {
			$.ajaxSetup({cache:false});
			setInterval(function() {$('#chatlogs').load('logs.php');}, 2000);
		});
		
	</script>
</head>
<body>
<h3><a href="logout.php">Logout</a></h3>
<h2>Howdy, <?php echo $_SESSION['username']; ?></h2>
	<div id="chatlogs">
    	LOADING CHATS, PLEASE WAIT...
    </div>
<form name="form1">
	</br> <textarea name="msg" placeholder="Your message here..." style="width:590px; height:30px;"></textarea>
	<a href="#" onClick="submitchat()" class="button">Send</a></br></br>
</form>
    </div>
</div>
</body>
</html>