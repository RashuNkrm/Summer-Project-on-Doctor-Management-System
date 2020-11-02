<?php 
	session_start();

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
			
			

			
			$result = mysqli_query($conn,$sql);


			

		$doInfo=[];

		while($info=mysqli_fetch_array($result,MYSQLI_BOTH)){
			array_push($doInfo , $info);
		}

		include_once("includes/header.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>schedule list</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.css"/>
	<link rel="stylesheet" type="text/css" href="cssfile.css"/>
</head>
<body>

	<!-- <div class="container-fluid">
		<div class="row">
			<div class="col-md-4">
				<?php
					include_once("includes/nav.php");
				?>
			</div>

			<div class="col-md-8"> -->
	<h1>Schedule Information</h1>
	<p>
		<form action="" method="post">
		<input type="text" placeholder="Search..." name="name1">
		<input type="submit" value="Search" name="search"> 
	</p>
	<table border="1" class="table table-hover" align="center" cellpadding="0" cellspacing="0">
		<thead>
			<tr>
				<th class="a" name='schedule_id'>ID</th>
				<th class="a">Schedule Date</th>
				<th class="a">Schedule Time</th>
				<th class="a">Schedule Day</th>
				<th class="a">Department</th>	
				<th class="a">Doctor Name</th>	
				

						
			</tr>
				
		</thead>
			


<tbody>
	<?php $i=1;foreach($doInfo as $info)  {  ?>
			<tr>
				  <td class="a"><?php echo $info['schedule_id'];?></td>
				<td class="a"><?php echo $info['schedule_date'] ; ?></td>
				<td class="a"><?php echo $info['schedule_time'] ; ?></td>	
				<td class="a"><?php echo $info['schedule_day'];?></td>
				<td class="a"><?php echo $info['department'];?></td>
				<td class="a"><?php echo $info['name'];?></td>
				
				
			</tr>
			<?php
		}
	

	?>
			

	

				
</tbody>


		</table>
		<button><a href="doctorlogin.php">Back</a></button>
<!-- </div>
</div>
</div>
 -->
</body>
</html>