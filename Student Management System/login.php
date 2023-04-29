<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
</head>
<style type="text/css">
	body{
		background-image: url(background-login.jpg);
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        background-repeat: repeat-y;
	}

	.form{
	    	width: 800px;
	    	height: 400px;
	    	margin: 0 auto;
	    	margin-top: 150px;
	    	padding-top: 10px;
	    	padding-left: 30px;
	    	padding-right: 30px;
	    	border-radius: 20px;
	    	-webkit-border-radius:15px;
	    	-o-border-radius:15px;
	    	-moz-border-radius:15px;
	    	color: white;
	    	font-weight:  bolder;
	    	font-size: 18px;
	    	border: 15px double black;
	    	background-color:#e2cb2bc4;
	    }
	    
	.h2{
		position: absolute;
    	top: 40%; 
    	right: 50%;
    	transform: translate(50%,-50%);
    	text-transform: uppercase;
    	font-family: verdana;
    	font-size: 30px;
    	font-weight: 700;
    	color: #D40BCB;
    	text-shadow: 1px 1px 1px #919191,
        1px 2px 1px #919191,
        1px 3px 1px #919191,
        1px 4px 1px #919191,
        1px 5px 1px #919191,
        1px 6px 1px #919191,
        1px 7px 1px #919191,
        1px 8px 1px #919191,
        1px 9px 1px #919191,
        1px 10px 1px #919191,
    	1px 18px 6px rgba(16,16,16,0.4),
    	1px 22px 10px rgba(16,16,16,0.2),
    	1px 25px 35px rgba(16,16,16,0.2),
    	1px 30px 60px rgba(16,16,16,0.4);
	}

	.button{
	    position: absolute;
	    top: 60%;
	    right: 45%;
	}
	
</style>

<body>
	<div class="form">
	<center><br><br>
	<div class="h2">
		<h2> Student Management System </h2>
	</div>
	<br>
	<div class="button">
		<form action="" method="POST">
			<input type="submit" name="admin_login" value="Admin Login" required>
			<input type="submit" name="student_login" value="Student Login" required>
		</form>
	</div>
	<?php
		if(isset($_POST['admin_login'])){
			header("Location: admin_login.php");
		}
		if(isset($_POST['student_login'])){
			header("Location: student_login.php");
		}
	?>
	</center>
</div>
</body>
</html>