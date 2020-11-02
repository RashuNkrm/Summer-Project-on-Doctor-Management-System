<?php

if(isset($_POST['submit'])){
	$err=[];
	if(isset($_POST['username']) && !empty($_POST['username'])){
		if(strlen($_POST['username'])<3){
		$err['username']= "Username must be 3 chararcter";
	}else{
		$username=$_POST['username'];
	}
}else{
		$err['username']='enter the username';
	}

	if(isset($_POST['password']) && !empty($_POST['password']))
	{
		$password=$_POST['password'];
	}else{
		$err['password']='enter the password';
	}



if(count($err)==0)
		{
			$con=mysqli_connect('localhost','root','987654321','summerproject');
			if(!$con)
			{
				die("Database Connection Error");
			}
			$sql="SELECT username,password from admin where username='$username' AND password='$password' ";
			$result=mysqli_query($con,$sql);
			
			if(mysqli_num_rows($result)==1)
			{
				session_start();
				$_SESSION['username']=$username;

				header('location:demo.php');

			}
			else
			{
				$err['submit']='login failed';
			}
		}

	}
	 

// 	if(isset($username) && isset($password))
// 	{
// 		if($username=='rasu' &&  $password='rasu234' )
// 		{
// 			session_start();
// 			$_SESSION['username']=$username;
			
// 			header('location:demo.php');	
// 		}else{
// 			$err['username'] ="enter the correct information";
// 		}

	
// }


include_once("includes/header.php");
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="astyle.css">
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<?php include 'link.php' ?>
</head>
<body>
	
		   <div class="container center-div shadow "> 
			 <div class="heading text-center text-uppercase text-white mb-5">Admin Login</div> 
			<div class="container row d-flex flex-row justify-content-center"> 
				<div class="admin-form">
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
						<input type="password" name="password" class="form-control" autocomplete="off">
						<span><?php
		if(isset($err['password'])){
			echo $err['password'];
		}

		?></span>
					</div>

					<input type="submit" name="submit" class="sub" value="login">

					</form>
				</div>
		<!--  </div> 
	
<div class="login-box">
</div>
 -->
 </div>
 </div>
 

</body>
</html>
