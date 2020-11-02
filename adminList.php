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
		$sql="SELECT * from admin";
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
	<link rel="stylesheet" type="text/css" href="bootstrap.css"/>
	<link rel="stylesheet" type="text/css" href="cssfile.css"/>
</head>
<body>
<div class="container-fluid">
<div class="row">
	<div class="col-md-4">
		<?php
		include_once("includes/nav.php");
		?>
	</div>
	<div class="col-md-8">
	<h1>Admin Information</h1>
	<table border="1" class="table table-hover" align="center" cellpadding="0" cellspacing="0" >
		<thead>
			<tr>
			<th name="adminID" class="a">ID</th>
				<th class="a">Username</th>
				<th class="a">Password</th>
				<!-- <th colspan='2'>Action</th> -->
				
			</tr>
		</thead>
<tbody>

	<?php  foreach($doInfo as $info)  {  ?>
			<tr>
				<td class="a"><?php echo $info['adminID'] ; ?></td>
				<td class="a"><?php echo $info['username'] ; ?></td>
				<td class="a"><?php echo $info['password'] ; ?></td>
			
				<!--  <td> <a href="delete_admin.php ? adminID=<?php echo $info['adminID']?>" onclick="return confirm('are you sure to delete?')"> Delete</a> 
				 	<a href="update_admin.php ?adminID=<?php echo $info['adminID']?>"> Edit   </a>
				 </td> -->
				
			</tr>

	<?php }  ?>
				
</tbody>

		</table>
		</div>
</div>
</div>
</body>
</html>