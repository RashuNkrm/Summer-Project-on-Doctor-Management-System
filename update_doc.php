<?php
session_start();
		if(!isset($_SESSION['username']))
			{
				header('location:admin.php');
			}

	$docID=$_GET['docID'];
	
		$conn=mysqli_connect('localhost','root','987654321','summerproject');
if(!$conn)
{
	die("Database connection error");
}
$sql="SELECT * from register where docID='$docID' ";
	$result=mysqli_query($conn,$sql);
	$doInfo=mysqli_fetch_array($result,MYSQLI_ASSOC);

	if(isset($_POST['update'])){
		$err=[];
	if(isset($_POST['name']) && !empty($_POST['name'])  && trim($_POST['name']) != ''){
			$name=$_POST['name'];
		}
		else
		{
			$err['name']='Enter your name';
		}
	if(isset($_POST['gender']) && !empty($_POST['gender'])){
		$gender=$_POST['gender'];
	}else{
		$err['gender']='Choose your gender';
	}
if(isset($_POST['register_date']) && !empty($_POST['register_date']) && trim($_POST['register_date'])!= ''){
		$register_date=$_POST['register_date'];
	}else{
		$err['register_date']='Enter your registered date';
	}

	if(isset($_POST['email']) && !empty($_POST['email']) && trim($_POST['email'])!= ''){
		$email=$_POST['email'];
	}else{
		$err['email']='Enter your email';
	}

	if(isset($_POST['contact_number']) && !empty($_POST['contact_number']) && trim($_POST['contact_number'])!=''){
		if(strlen($_POST['contact_number'])<10)
					{
						$err['contact_number']="Phone number must have 10 digits";

					}else{
		$contact_number=$_POST['contact_number'];
	}
	}else{
		$err['contact_number']='Enter the contact number';
	}
	if(isset($_POST['department']) && !empty($_POST['department']) && trim($_POST['department'])!=''){
		$department=$_POST['department'];
	}else{
		$err['department']='Enter the department';
	}
	
	if(isset($_POST['lic_number']) && !empty($_POST['lic_number']) && trim($_POST['lic_number'])!='')
		
	{
		if(strlen($_POST['lic_number'])!=4)
					{
						$err['lic_number']="License number must have 4 digits";

					}
	else{
		$lic_number=$_POST['lic_number'];
	}
}else{

		$err['lic_number']='Enter the dr.license number';
	}


	if(count($err)==0){
		
			$sql="UPDATE register set name='$name',gender='$gender',register_date='$register_date',contact_number='$contact_number',email='$email',department='$department', lic_number='$lic_number' where docID='$docID' " ;
			mysqli_query($conn,$sql);
			header('location:doctorEdit.php');
	}
		
		}	//header('location:registerList.php');
	
?>


<!DOCTYPE html>
<html>
<head>
	<title>register</title>
	<link rel="stylesheet" type="text/css" href="fstyle.css"> 
</head>
<body>
<?php
include_once("includes/header.php");
?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4">
				<?php
					include_once("includes/nav.php");
				?>
			</div>

			<div class="col-md-8">
	<!-- <h1>Registration Form</h1> -->
	<div class='register'>
	<h2 style="color: #fff;">Register here</h2>

	<form action="#" id="register" method="post">
			<label>Name:</label><br>
		<input type="text" name="name" class="a" value="<?php echo $doInfo['name']?>">
			<span class="echo">
		<?php
		if(isset($err['name'])){
			echo $err['name'];
		}
		?>
		</span>
		<br><br>

		<label>Gender</label>
		<?php
				if($doInfo['gender']=='$gender')
				{
		?> 
		<input type="radio" name="gender" id='gender' class="z" value="female" />Female
		<input type="radio" name="gender" id='gender' class='z' value="male" />Male
		<?php }
		 else {?>
		<input type="radio" name="gender" id='gender' class="z" value="female" />Female
		<input type="radio" name="gender" id='gender' class='z' value="male" />Male
			<span class="echo">
		<?php
		if(isset($err['gender'])){
			echo $err['gender'];
		}
		?>
		</span>
		<br><br>
		

		<label>Register Date</label><br>
		<input type="date" name="register_date" class="a" value="<?php echo $doInfo['register_date']?>">
			<span class="echo">
		<?php
		if(isset($err['register_date'])){
			echo $err['register_date'];
		}

		?>
			<?php } ?>
			</span>
		<br><br>

		<label>Email</label><br>
		<input type="email" name="email" class="a" value="<?php echo $doInfo['email']?>">
			<span class="echo">
		<?php
		if(isset($err['email'])){
			echo $err['email'];
		}
		?>
		</span>
		<br><br>

		<label>Contact Number</label><br>
		<input type="number" name="contact_number" class="a" value="<?php echo $doInfo['contact_number']?>">
			<span class="echo">
		<?php
		if(isset($err['contact_number'])){
			echo $err['contact_number'];
		}
		?>
		</span>
		<br><br>

		<label>Department</label><br>
		<select class="op" name="department" value="<?php echo $doInfo['department']?>">
			<option>Select department</option>
			<option name='department'>Dental</option>
			<option name='department'>Dermatology</option>
			<option name='department'>ENT</option>
			<option name='department'>Gastro-intestinal</option>
			<option name='department'>General Surgery</option>
			<option name='department'>Nephrology</option>
			<option name='department'>Neurosurgery</option>
			<option name='department'>Opthalmology</option>
			<option name='department'>Pathology</option>
		</select>
			<span class="echo">
		<?php
		if(isset($err['department'])){
			echo $err['department'];
		}
		?>
		</span><br><br>
		<label>Dr.License number</label><br>
		<input type="number" name="lic_number" class="a" value="<?php echo $doInfo['lic_number']?>">
			<span class="echo"><?php
		if(isset($err['lic_number'])){
			echo $err['lic_number'];
		}
		?>
		</span><br><br>

		<input type="submit" name="update" id="sub" value="update">
	</form>
	</div>
</div>
</div>
</div>

</body>
</html>