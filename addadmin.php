<?php

if(isset($_POST['submit'])){
	$err=[];
	if(isset($_POST['username']) && !empty($_POST['username']))
	{
		$username=$_POST['username'];
	}else{
		$err['username']='enter the username';
	}

	if(isset($_POST['password']) && !empty($_POST['password']))
	{
		$password=$_POST['password'];
	}else{
		$err['password']='enter the password';
	}

	
}
$err=[];
if(count($err)==0)
		{
			if(isset($username) && isset($password)){

			$conn=mysqli_connect('localhost','root','987654321','summerproject');
			//database connection error check

			if(!$conn)
			{
				die('database connection error');
			}
			$sql="INSERT into admin(username,password)
			values('$username','$password')";
			mysqli_query($conn,$sql);
		}

}

include_once('includes/header.php');

?>



<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="astyle.css">
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<?php include 'link.php' ?>
</head>
<body>

	<div class="container-fluid">	
			<!-- <div class="text-center">Admin Login</div> -->
			
			
<div class="row">
<div class="col-md-4">
<?php
include_once('includes/nav.php');
?>
</div>
<div class="col-md-8">

     
					<form action="#" method="POST">
					<div class="form-group">

						<label>Username</label>
						<input type="text" name="username" class="form-control" autocomplete="off">
						<span>
							<?php
		if(isset($err['username'])){
			echo $err['username'];
		}
		?>
						</span>
					</div>

					<div class="form-group">
						<label>Password</label>
						<input type="password" name="password" value="" class="form-control" autocomplete="off">
						<span><?php
		if(isset($err['password'])){
			echo $err['password'];
		}

		?></span>
					</div>

					<input type="submit" name="submit" class="sub" value="Add Admin"><br><br>
					<button class="sub"><a href="adminList.php">View admin</a></button>

					</form>
				


</div>
</div>
</div>
			


			 
		
</body>
</html>
