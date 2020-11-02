<?php
if(isset($_POST['submit'])){
$err=[];
if(isset($_POST['schedule_date']) && !empty($_POST['schedule_date']))
	{
		$schedule_date=$_POST['schedule_date'];
	}
else
		{
			$err['schedule_date']='Enter the date of schedule';
		}
	if(isset($_POST['schedule_time']) && !empty($_POST['schedule_time']))
	{
		$schedule_time=$_POST['schedule_time'];
	}
	else
		{
			$err['schedule_time']='Enter the time of the schedule';
		}

if(isset($_POST['schedule_day']) && !empty($_POST['schedule_day']))
	{
		$schedule_day=$_POST['schedule_day'];
	}
	else
		{
			$err['schedule_day']='Enter the day of the schedule';
		}

	if(isset($_POST['department']) && !empty($_POST['department']))
	{
		$department=$_POST['department'];
	}
	else
		{
			$err['department']='select the department';
		}
		
		if(isset($_POST['name']) && !empty($_POST['name']))
	{
		$name=$_POST['name'];
	}
	else
		{
			$err['name']='select the name';
		}
		

	
}
$err=[];
if(count($err)==0)
		{
			if(isset($schedule_date) && isset($schedule_time) && isset($schedule_day) && isset($department) && isset($name)){

		

			$conn=mysqli_connect('localhost','root','987654321','summerproject');
			//database connection error check

			if(!$conn)
			{
				die('database connection error');
			}
			

			$sql="INSERT into schedule(schedule_date,schedule_time,schedule_day,department,name)
			values('$schedule_date','$schedule_time','$schedule_day','$department','$name')";
			mysqli_query($conn,$sql);



			 
			
			  

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
		<input type="date" name="schedule_date" class='a'><br>
		<?php
		if(isset($err['schedule_date'])){
			echo $err['schedule_date'];
		}
		?>
		
		<label>Schedule Time</label>
		<input type="time" name="schedule_time" class='a'><br>
		<?php
		if(isset($err['schedule_time'])){
			echo $err['schedule_time'];
		}
		?>
		
		<label>Schedule Day</label>
		<input type="textarea" name="schedule_day" class="a"></br>
		<?php
		if(isset($err['schedule_day'])){
			echo $err['schedule_day'];
		}
		?>

		
		<label>Department</label><br>
		<select class="op" name='department'>
			<option>Select department</option>
			<?php 
			$conn=mysqli_connect('localhost','root','987654321','summerproject');
			//database connection error check

			if(!$conn)
			{
				die('database connection error');
			}
		$sql1="SELECT department from register";
			 $result1=mysqli_query($conn,$sql1 );
			 if (mysqli_num_rows($result1) > 0) {
			 	while($row = mysqli_fetch_assoc($result1)) {
			 ?> 
		 <option name='department'><?= $row['department']?></option>
			<?php 
				} }
			?> 
		</select> 
		<?php
		if(isset($err['department'])){
			echo $err['department'];
		}
		?>
		<br>
		<br>



		<label>Doctor Name</label>
		<select class="op" name='name'>
			<option>Select name </option>

			<?php 
			$conn=mysqli_connect('localhost','root','987654321','summerproject');
			//database connection error check

			if(!$conn)
			{
				die('database connection error');
			}
		$sql1="SELECT name from register";
			 $result=mysqli_query($conn,$sql1 );
			 if (mysqli_num_rows($result) > 0) {
			 	while($row = mysqli_fetch_assoc($result)) {
			 ?> 
		 <option name='name'><?= $row['name']?></option>
			<?php 
				} }
			?> 
		</select>
		<?php
		if(isset($err['name'])){
			echo $err['name'];
		}
		?>
		<br>
		<br>

		
		<input type="submit" name="submit" value="submit">
	</form>
</div>
</div>
</div>
</div>

</body>
</html>