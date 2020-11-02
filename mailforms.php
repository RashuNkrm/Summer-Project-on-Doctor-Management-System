<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="mailcss.css">
	<title></title>
	
</head>
<body>

		
	<h1>Send email</h1>
	<form action="mail.php" method="post" >
		<label class="a">To:</label><br>
		<textarea for="to_textarea" class="to_textarea" name="to_textarea" id="to_textarea" ></textarea><br>

		<label class="a">Subject:</label><br>
		<textarea class='to_textarea'></textarea><br>

		<label class="a">Message:</label><br>
		<textarea class='to_textarea'></textarea><br>

		<input type="submit" name="submit" value="send" class="sub">
		
		<button class="sub"><a href="demo.php">Back</a></button>
	
	</form>

	
</body>
</html>


