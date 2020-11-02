<?php
	$conn = mysqli_connect('localhost','root','987654321','summerproject');
			
			if (!$conn) {
				die('Database Connection Error');
			}
			$adminID=$_GET['adminID'];
			$sql= "DELETE from admin where adminID='$adminID'";
			mysqli_query($conn,$sql);
			header("location:adminEdit.php");


?>