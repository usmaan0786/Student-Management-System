<!DOCTYPE html>
<html>
<head>
	<title>Student Login</title>
</head>
<style type="text/css">
	body{
		background-image: url(background-student.jpg);
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
	    top: 55%;
	    right: 45%;
	}
</style>
<body>
	<div class="form">
	<center><br><br>
		<div class="h2"><h2>Student LogIn Page</h2></div><br>
		<div class="button">
		<form action="" method="post">
			Email ID: <input type="text" name="email" required><br><br>
			Password: <input type="password" name="password" required><br><br>
			<input type="submit" name="submit" value="LogIn">
		</form> </div><br>
		<?php
			session_start();
			if(isset($_POST['submit']))
			{
				$connection = mysqli_connect("localhost","root","");
				$db = mysqli_select_db($connection,"sms");
				$query = "select * from students where email = '$_POST[email]'";
				$query_run = mysqli_query($connection,$query);
				while ($row = mysqli_fetch_assoc($query_run)) 
				{
					if($row['email'] == $_POST['email'])
					{
						if($row['password'] == $_POST['password'])
						{
							$_SESSION['name'] =  $row['name'];
							$_SESSION['email'] =  $row['email'];
							header("Location: student_dashboard.php");
						}
						else{
							?>
							<span>Wrong Password !!</span>
							<?php
						}
					}
					else
					{
						?>
						<span>Wrong UserName !!</span>
						<?php
					}
				}
			}
		?>
	</center>
</div>
</body>
</html>