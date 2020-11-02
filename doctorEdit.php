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
			 	$sql="select * from register where name like '".$_POST['name1']."%'";
			 }else{
			 	$sql="select * from register";
			 }
		// $sql="SELECT * from register";
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
	<title>Admin edit</title>
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

	<h1>Doctor Information</h1>
		<p>
		<form action="" method="post">
		<input type="text" placeholder="Search..." name="name1">
		<input type="submit" value="Search" name="search"> 
	</p>
	<table class="table table-hover">
		<thead>
			<tr style="background-color: teal">
			<th name="docID" >ID</th>
				<th>Name</th>
				<th>Gender</th>
				<th>Register Date</th>
				<th>Email</th>
				<th>Contact Number</th>
				<th>Department</th>
				<th>Doctor License Number</th>
				<th colspan='2'>Action</th>
				
			</tr>
		</thead>
<tbody>

	<?php  foreach($doInfo as $info)  {  ?>
			<tr>
				<td><?php echo $info['docID'] ; ?></td>
				<td><?php echo $info['name'] ; ?></td>
				<td><?php echo $info['gender'] ; ?></td>
				<td><?php echo $info['register_date'] ; ?></td>
				<td><?php echo $info['email'] ; ?></td>
				<td><?php echo $info['contact_number'] ; ?></td>
				<td><?php echo $info['department'] ; ?></td>
				<td><?php echo $info['lic_number'] ; ?></td>
				 <td> <a href="delete_doc.php ? docID=<?php echo $info['docID']?>" onclick="return confirm('are you sure to delete?')"> Delete</a> 
				 	<a href="update_doc.php ?docID=<?php echo $info['docID']?>"> Edit   </a>
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