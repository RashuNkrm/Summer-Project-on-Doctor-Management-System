<?php

$to=$_REQUEST["to_textarea"];
//echo $to;
$subject="About update";
$txt= "Hello doctor, the schedule have been updated.Please checkout the 
	new schedule....";

	$header="From: rasusmith1@gmail.com" . "\r\n" .
	"CC: $to" ;


if(mail($to,$subject,$txt,$header)){
	echo "<h1 align='center'><font color='#008000'> &#x2714; Your message has been successfully sent to $to!!</font></h1>";
}
else{
	echo "<h1 align='center'><font color='#008000'> &#x2716; Message unsuccessful </font></h1>";
}
?>