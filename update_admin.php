<?php
session_start();
		if(!isset($_SESSION['username']))
			{
				header('location:admin.php');
			}

	$adminID=$_GET['adminID'];
	
		$conn=mysqli_connect('localhost','root','987654321','summerproject');
if(!$conn)
{
	die("Database connection error");
}
$sql="SELECT * from admin where adminID='$adminID' ";
	$result=mysqli_query($conn,$sql);
	$doInfo=mysqli_fetch_array($result,MYSQLI_ASSOC);

	if(isset($_POST['update'])){
		$err=[];
	
	if(isset($_POST['username']) && !empty($_POST['username'])){
		if(strlen($_POST['username'])<4){
		$err['username']= "Username must be 4 chararcter";
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
	if(count($err)==0){
		
			$sql="UPDATE admin set username='$username',password='$password' where adminID='$adminID'" ;
			mysqli_query($conn,$sql);
			header('location:adminEdit.php');
	}
		
		}	//header('location:registerList.php');
	
?>


<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	
		

	<link rel="stylesheet" type="text/css" href="astyle.css">
	<?php include 'link.php' ?>
</head>
<body>

		 <div class="container center-div shadow "> 
			<div class="heading text-center text-uppercase text-white mb-5">Admin Update</div>
			<div class="container row d-flex flex-row justify-content-center">
				<div class="admin-form">
					<form action="#" method="POST">
						<div class="form-group">
						<label>Username</label>
						<input type="text" name="username" class="form-control" autocomplete="off" value="<?php echo $doInfo['username']?>">
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
						<input type="password" name="password" class="form-control" autocomplete="off" value="<?php echo $doInfo['password']?>">
						<span><?php
		if(isset($err['password'])){
			echo $err['password'];
		}

		?></span>
					</div>

					<input type="submit" name="update"  class="btn btn-success" value="update">

					</form>
				</div>
		 </div> 
	</div>
<div class="login-box">


</body>
</html>