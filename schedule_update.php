
<?php

	session_start();
		if(!isset($_SESSION['username']))
			{
				header('location:admin.php');
			}

	$schedule_id=$_GET['schedule_id'];
	
		$conn=mysqli_connect('localhost','root','987654321','summerproject');
if(!$conn)
{
	die("Database connection error");
}
$sql="SELECT * from schedule where schedule_id='$schedule_id' ";
	$result=mysqli_query($conn,$sql);
	$doInfo=mysqli_fetch_array($result,MYSQLI_ASSOC);

	if(isset($_POST['update'])){
		$err=[];


if(isset($_POST['schedule_date']) && !empty($_POST['schedule_date']))
	{
		$schedule_date=$_POST['schedule_date'];
	}

	if(isset($_POST['schedule_time']) && !empty($_POST['schedule_time']))
	{
		$schedule_time=$_POST['schedule_time'];
	}

if(isset($_POST['schedule_day']) && !empty($_POST['schedule_day']))
	{
		$schedule_day=$_POST['schedule_day'];
	}

	if(isset($_POST['department']) && !empty($_POST['department']))
	{
		$department=$_POST['department'];
	}

	
}
$err=[];
if(count($err)==0)
		{
			 if(isset($schedule_date) && isset($schedule_time) && isset($schedule_day) && isset($department)){

		

			$conn=mysqli_connect('localhost','root','987654321','summerproject');
			//database connection error check

			if(!$conn)
			{
				die('database connection error');
			}

			$sql="UPDATE schedule set schedule_date='$schedule_date',schedule_time='$schedule_time',schedule_day='$schedule_day',department='$department' where schedule_id='$schedule_id' ";
			
			mysqli_query($conn,$sql);
			header('location:scheduleEdit.php');

		}
	


 include_once("includes/header.php");

}
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="doctorstyle.css">
</head>

<body>
	<div class="container-fluid" style="position:fixed;">
		<div class="row">
			<div class="col-md-4">
				<?php
					include_once("includes/nav.php");
				?>
			</div>

			<div class="col-md-8" style="position: fixed;">

<div class="login-box">
<h1>Schedule Form</h1>
	<form method="post" action="#">
		<label>Schedule Date</label>
		<input type="date" name="schedule_date" class='a' value="<?php echo $doInfo['schedule_date']?>">
		<?php
		if(isset($err['schedule_date'])){
			echo $err['schedule_date'];
		}
		?>
		
		<label>Schedule Time</label>
		<input type="time" name="schedule_time" class='a' value="<?php echo $doInfo['schedule_time']?>"><br>
		<?php
		if(isset($err['schedule_time'])){
			echo $err['schedule_time'];
		}
		?>
		
		<label>Schedule Day</label>
		<input type="text" name="schedule_day" class="a" value="<?php echo $doInfo['schedule_day']?>"</br>
		<?php
		if(isset($err['schedule_day'])){
			echo $err['schedule_day'];
		}
		?>

		
		<label >Department</label><br>
		<select class="op" name='department' value="<?php echo $doInfo['department']?>">
			<option>Select department</option>
			<option name='department' >Dental</option>
			<option name='department' >Dermatology</option>
			<option name='department' >ENT</option>
			<option name='department'>Gastro-intestinal</option>
			<option name='department' >General Surgery</option>
			<option name='department' >Nephrology</option>
			<option name='department' >Neurosurgery</option>
			<option name='department' >Opthalmology</option>
			<option name='department' >Pathology</option>
		</select>
		<?php
		if(isset($err['department'])){
			echo $err['department'];
		}
		?>
<br><br>
		<input type="submit" name="update" value="update">
	</form>
</div>
</div>
</div>
</div>

</body>
</html>