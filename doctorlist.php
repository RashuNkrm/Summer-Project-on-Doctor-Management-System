<?php 
	
	session_start();
	/*if(!isset($_SESSION['username']))
	{
		header('location:registerform.php');
	}
*/
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

		$docInfo=[];

		while($info=mysqli_fetch_array($result,MYSQLI_BOTH)){
			array_push($docInfo , $info);
		}
	/*header("doctorlist.php");*/
		
include_once("includes/header.php");
?>



<!DOCTYPE html>
<html>
<head>
	<title>doctor list</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.css"/>
	<link rel="stylesheet" type="text/css" href="cssfile.css"/>
</head>
<body>
		
	<h1>Doctor Information</h1>
	<p>
		<form action="" method="post">
		<input type="text" placeholder="Search..." name="name1">
		<input type="submit" value="Search" name="search"> 
	</p>
	<table border="1" class="table table-hover" align="center" cellpadding="0" cellspacing="0">
		<thead>
			<tr>
				 <th class="a" name='docID'>DoctorID</th> 
				<th class="a">Name</th>
				<th class="a">Gender</th>
				<th class="a">Register Date</th>
				<th class="a">Email</th>
				<th class="a">Contact Number</th>
				<th class="a">Department</th>
				<th class="a">Doctor License Number</th>
				<!-- <th>Action</th> -->
			</tr>
		</thead>

<tbody>
	<?php $i=1;foreach($docInfo as $info)  {  ?>
			<tr>
				 <td class="a"><?php echo $info['docID'];?></td> 
				<td class="a"><?php echo $info['name'] ; ?></td>
				<td class="a"><?php echo $info['gender'] ; ?></td>
				<td class="a"><?php echo $info['register_date'] ; ?></td>
				<td class="a"><?php echo $info['email'] ; ?></td>
				<td class="a"><?php echo $info['contact_number'] ; ?></td>
				<td class="a"><?php echo $info['department'] ; ?></td>
				<td class="a"><?php echo $info['lic_number'] ; ?></td>
				
				
			</tr>


	<?php }  ?>

				
</tbody>


		</table>
		<button><a href="demodoc.php">Back</a></button>
		
</body>
</html>