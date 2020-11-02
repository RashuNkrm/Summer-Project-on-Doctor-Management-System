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
// include_once("includes/nav.php");

?>




<!DOCTYPE html>
<html>
<head>
	<title>Admin edit</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
</head>
<body>
<?php
include_once("includes/nav.php");
?>
	<div class="container-fluid">	

	<div class="row">
		<div class="col-md-4">
			<?php
				include_once("includes/nav.php");
			?>
		</div>
		<div class="col-md-8">
	<h1>Admin Information</h1>
	<table class="table table-hover">
		<thead>
			<tr>
			<th name="adminID">ID</th>
				<th>Username</th>
				<th>Password</th>
				<th colspan='2'>Action</th>
				
			</tr>
		</thead>
<tbody>

	<?php  foreach($doInfo as $info)  {  ?>
			<tr>
				<td><?php echo $info['adminID'] ; ?></td>
				<td><?php echo $info['username'] ; ?></td>
				<td><?php echo $info['password'] ; ?></td>
			
				 <td> <a href="delete_admin.php ? adminID=<?php echo $info['adminID']?>" onclick="return confirm('are you sure to delete?')"> Delete</a> 
				 	<a href="update_admin.php ?adminID=<?php echo $info['adminID']?>"> Edit   </a>
				 </td>
				
			</tr>

	<?php }  ?>
				
</tbody>

		</table>
		</div>
		

</body>
</html>