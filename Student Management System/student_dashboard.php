<!DOCTYPE html>
<html>
<head>
	<title>Admin Dashboard</title>
	<style type="text/css">
	body{
		background-image: url(background-admin-dashboard.jpeg);
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        background-repeat: repeat-y;
	}


	.header{
		width: 1000px;
	    height: 190px;
	    background-color: #e2cb2bc4;
	    margin: 0 auto;
	    margin-top:5px;
	    border-radius: 15px;
	    -wedkit-border-radius:15px;
	    -o-border-radius:15px;
	    -moz-border-radius:15px;
	    font-weight: bolder;
	    font-size: 15px;
	    font-family: Andalus;
        border:10px double red;
	}

	.h4{
		position: absolute;
    	top: 5%; 
    	right: 50%;
    	transform: translate(50%,-50%);
    	text-transform: uppercase;
    	font-family: verdana;
    	font-size: 25px;
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
		.left_side{
			height: 150px;
			width: 150px;
			top: 35%;
			position: absolute;
			background-color: #e2cb2bc4;
			-wedkit-border-radius: 15px;
			-o-border-radius: 15px;
			-moz-border-radius: 15px;
			border:10px double red;
			border-radius:15px;
		}
		#right_side{
			height: 70%;
			width: 80%;
			background-color: whitesmoke;
			position: fixed;
			left: 17%;
			top: 25%;
			color: red;
			border: solid 1px black;
		}

		.demo{
			height: 420px;
			width: 80%;
			position: fixed;
			left: 15%;
			top: 35%;
			color: #ffffff;
			background-image: url("background.jpg");
			background-repeat: no-repeat;
			background-size: cover;
			border: solid 1px black;
			font-family: italic;
			-wedkit-border-radius: 15px;
			-o-border-radius: 15px;
			-moz-border-radius: 15px;
			border:7px solid black;
			border-radius:15px;
		}

	</style>
	<?php
		session_start();
		$connection = mysqli_connect("localhost","root","");
		$db = mysqli_select_db($connection,"sms");
	?>
</head>
<body>
	<div class="header">
		<center><div class="h4"><h4>Student Management System </h4></div><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email: <?php echo $_SESSION['email'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name:<?php echo $_SESSION['name'];?> 
		<a href="logout.php">Logout</a>
		<marquee>Note:- This portal is open till 31 March 2020...Plz edit your information, if wrong.</marquee>
		</center>
	</div>
	
	<div class="left_side">
		<br><br>
		<form action="" method="post">
		
			<table>
				<tr>
					<td>
						<input type="submit" name="edit_detail" value="Edit Detail">
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" name="show_detail" value="Show Detail">
					</td>
				</tr>
			</table>
		</form>
	</div>
	<div classs="right_side"><br><br>
		<div class="demo">
			<?php
			if(isset($_POST['show_detail']))
			{
				$query = "select * from students where email = '$_SESSION[email]'";
				$query_run = mysqli_query($connection,$query);
				while ($row = mysqli_fetch_assoc($query_run)) 
				{
			?>
				<table>
					<tr>
						<td>
							<b>Roll No:</b>
						</td> 
						<td>
							<input type="text" value="<?php echo $row['roll_no']?>" disabled>
						</td>
					</tr>
					<tr>
						<td>
							<b>Name:</b>
						</td> 
						<td>
							<input type="text" value="<?php echo $row['name']?>" disabled>
						</td>
					</tr>
					<tr>
						<td>
							<b>Father's Name:</b>
						</td> 
						<td>
							<input type="text" value="<?php echo $row['father_name']?>" disabled>
						</td>
					</tr>
					<tr>
						<td>
							<b>Class:</b>
						</td> 
						<td>
							<input type="text" value="<?php echo $row['class']?>" disabled>
						</td>
					</tr>
					<tr>
						<td>
							<b>Mobile:</b>
						</td> 
						<td>
							<input type="text" value="<?php echo $row['mobile']?>" disabled>
						</td>
					</tr>
					<tr>
						<td>
							<b>Email:</b>
						</td> 
						<td>
							<input type="text" value="<?php echo $row['email']?>" disabled>
						</td>
					</tr>
					<tr>
						<td>
							<b>Password:</b>
						</td> 
						<td>
							<input type="password" value="<?php echo $row['password']?>" disabled>
						</td>
					</tr>
					<tr>
						<td>
							<b>Remark:</b>
						</td> 
						<td>
							<textarea rows="3" cols="40" disabled><?php echo $row['remark']?></textarea>
						</td>
					</tr>
				</table>
				<?php
				}	
			}
			?>

			<?php
			if(isset($_POST['edit_detail']))
			{
				$query = "select * from students where email = '$_SESSION[email]'";
				$query_run = mysqli_query($connection,$query);
				while ($row = mysqli_fetch_assoc($query_run)) 
				{
					?>
					<form action="edit_student.php" method="post">
						<table>
						<tr>
							<td>
								<b>Roll No:</b>
							</td> 
							<td>
								<input type="text" name="roll_no" value="<?php echo $row['roll_no']?>">
							</td>
						</tr>
						<tr>
							<td>
								<b>Name:</b>
							</td> 
							<td>
								<input type="text" name="name" value="<?php echo $row['name']?>">
							</td>
						</tr>
						<tr>
							<td>
								<b>Father's Name:</b>
							</td> 
							<td>
								<input type="text" name="father_name" value="<?php echo $row['father_name']?>">
							</td>
						</tr>
						<tr>
							<td>
								<b>Class:</b>
							</td> 
							<td>
								<input type="text" name="class" value="<?php echo $row['class']?>">
							</td>
						</tr>
						<tr>
							<td>
								<b>Mobile:</b>
							</td> 
							<td>
								<input type="text" name="mobile" value="<?php echo $row['mobile']?>">
							</td>
						</tr>
						<tr>
							<td>
								<b>Email:</b>
							</td> 
							<td>
								<input type="text" name="email" value="<?php echo $row['email']?>">
							</td>
						</tr>
						<tr>
							<td>
								<b>Password:</b>
							</td> 
							<td>
								<input type="password" name="password" value="<?php echo $row['password']?>">
							</td>
						</tr>
						<tr>
							<td>
								<b>Remark:</b>
							</td> 
							<td>
								<textarea rows="3" cols="40" name="remark"><?php echo $row['remark']?></textarea>
							</td>
						</tr><br>
						<tr>
							<td></td>
							<td>
								<input type="submit" value="Save">
							</td>
						</tr>
					</table>
					</form>
					<?php
				}
			}
			?>
		</div>
	</div>
</body>
</html>
