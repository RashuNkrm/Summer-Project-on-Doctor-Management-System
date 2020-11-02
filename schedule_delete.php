<?php
	$conn = mysqli_connect('localhost','root','987654321','summerproject');
			
			if (!$conn) {
				die('Database Connection Error');
			}
			$schedule_id=$_GET['schedule_id'];
			$sql= "DELETE from schedule where schedule_id='$schedule_id'";
			mysqli_query($conn,$sql);
			header("location:scheduleEdit.php");


?>
