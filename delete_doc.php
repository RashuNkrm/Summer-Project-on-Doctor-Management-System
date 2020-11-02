<?php
	$conn = mysqli_connect('localhost','root','987654321','summerproject');
			
			if (!$conn) {
				die('Database Connection Error');
			}
			$docID=$_GET['docID'];
			$sql= "DELETE from register where docID='$docID'";
			mysqli_query($conn,$sql);
			header("location:doctorEdit.php");


?>