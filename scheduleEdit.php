<?php 
session_start();
 if(!isset($_SESSION['username']))
 {
 	header('location:admin.php');
}
	
	$conn=mysqli_connect('localhost','root','987654321','summerproject');
			
			if(!$conn)
			{
				die('database connection error');
			}	
			 if(isset($_POST['search'])){
			 	$sql="select * from schedule where name like '".$_POST['name1']."%'";
			 }else{
			 	$sql="select * from schedule";
			 }
		// $sql="SELECT * from schedule";
		$result = mysqli_query($conn,$sql);

		$doInfo=[];

		while($info=mysqli_fetch_array($result)){
			array_push($doInfo , $info);
		}
		
include_once("includes/header.php");
?>




<!DOCTYPE html>
<html>
<head>
	<title>Schedule edit</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
</head>
<body>
	<div class="container-fluid">

	<div class="row">
		<div class="col-md-4">

		<?php
	include_once('includes/nav.php');
		?>
		</div>
	<div class="col-md-8">
	<div style="padding-right:30px;">

	<h1>Schedule Information</h1>
		<p>
		<form action="" method="post">
		<input type="text" placeholder="Search..." name="name1">
		<input type="submit" value="Search" name="search"> 
	</p>
	<table class="table table-hover">
		<thead>
			<tr style="background-color: teal">
			<th name="schedule_id" >ID</th>
				<th>Schedule Date</th>
				<th>Schedule Day</th>
				<th>Schedule Time</th>
				<th>Department</th>
				<th>Doctor Name</th>
				<th colspan='2'>Action</th>
				
			</tr>
		</thead>
<tbody>

	<?php  foreach($doInfo as $info)  {  ?>
			<tr>
				<td><?php echo $info['schedule_id'] ; ?></td>
				<td><?php echo $info['schedule_date'] ; ?></td>
				<td><?php echo $info['schedule_day'] ; ?></td>
				<td><?php echo $info['schedule_time'] ; ?></td>
				<td><?php echo $info['department'] ; ?></td>
				<td><?php echo $info['name']; ?> </td>
				<td> <a href="schedule_delete.php ? schedule_id=<?php echo $info['schedule_id']?>" onclick="return confirm('are you sure to delete?')"> Delete</a> 
				 	<a href="schedule_update.php ?schedule_id=<?php echo $info['schedule_id']?>"> Edit   </a>
				 </td>
				
			</tr>

	<?php }  ?>
				
</tbody>

		</table>
		
</div>
</div>
</div>
</body>
</html>