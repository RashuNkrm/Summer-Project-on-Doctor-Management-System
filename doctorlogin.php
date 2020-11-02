<?php
$err=[];
if(isset($_POST['submit'])){
	
	if(isset($_POST['username']) && !empty($_POST['username'])  && trim($_POST['username']) != ''){
			$username=$_POST['username'];
		}
		else
		{
			$err['username']='Enter your username';
		}
		
		if(isset($_POST['email']) && !empty($_POST['email'])  && trim($_POST['email']) != ''){
			$email=$_POST['email'];
		}
		else
		{
			$err['email']='Enter your email';
		}

		if(count($err)==0){
			$con=mysqli_connect('localhost','root','987654321','summerproject');
			if(!$con){
				die("Database connection error");
			}
			

			$sql="SELECT username,email from doctor_login where username='$username' AND email='$email'";
			$result=mysqli_query($con,$sql);

			if(mysqli_num_rows($result)==1)
			{

				session_start();
				$_SESSION['username']=$username;
				header('location:demodoc.php');
			}
			else{
				$err['submit']='login fail';
			}
		}
	
}
include_once("includes/header1.php");


?>



<!DOCTYPE html>
<html>
<head>
	<title>Doctor login</title>
	<link rel="stylesheet" type="text/css" href="doctorstyle.css">
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
</head>
<body>

	<div class="login-box">
	<!-- <img src="bulb.jpg" class="char"> -->
	<h1>Doctor login</h1>
	<form action="demodoc.php" method="post">
	
		<label>Username</label>
		 <input type="text" name="username" class='a' placeholder="Enter your username">
		
<br><!-- 
		<label>Password</label><br>
		<input type="password" name="password" class="a" placeholder="Enter your password">
		
			<br> -->  	
		<label>Email</label><br>
		<input type="email" name="email" class="a" placeholder="Enter your email">
		

		<input type="submit" name="submit" value="login">
		<a href="#">Forgot Password?</a>
	</form>
</div>
</body>
</html>