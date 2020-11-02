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
	
$err=[];
if(count($err)==0)
		{
			if(isset($username)  && isset($email)){


			$conn=mysqli_connect('localhost','root','987654321','summerproject');
			//database connection error check

			if(!$conn)
			{
				die('database connection error');
			}

			
			$sql="INSERT into doctor_login(username,email)
			values('$username','$email')";
			mysqli_query($conn,$sql);
		}
	
}
}


?>



<!DOCTYPE html>
<html>
<head>
	<title>Doctor login</title>
	<link rel="stylesheet" type="text/css" href="doctorstyle.css">
</head>
<body>
<?php
if(isset($_GET['msg']) && $_GET['msg']==1){
	echo "Please login to continue";
}
?>
	<div class="login-box">
	
	<h1>Doctor login</h1>
	<form action="doctorlist.php" method="post">

		

		<label>Username</label><br>
		<input type="text" name="username" class='a' placeholder="Enter your username">
		<?php
			if(isset($err['username'])){
				echo $err['username'];
			}
			?>

		<label>Email</label><br>
		<input type="email" name="email" class="a" placeholder="Enter your email">
		<?php
			if(isset($err['email'])){
				echo $err['email'];
			}
			?><br>

		<input type="submit" name="submit" value="Add Doctor">
		<a href="#">Forgot Password?</a>
	</form>
</div>
</body>
</html>