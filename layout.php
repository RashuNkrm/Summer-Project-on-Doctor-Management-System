<!DOCTYPE html>
<html>
<head>
	<title>layout</title>
	<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="layoutcss.css">
  <link rel="stylesheet" type="text/css" href="bootstrap.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
	<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
</head>
<body>
	<div class="header" style="position:sticky; top:0;" >

  	<h1 style="color: maroon;">Dr.Iwamura Memorial Hospital and Research Center</h1>

 
<!-- <div class="topnav" >
  <a href="#"> Home</a>
  <a href="#">About Us</a>
  <a href="#">Contact Us</a>
   <a href="#">Our Services</a> -->
   <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li class="active"><a href="#">Our Services</a></li>
      <li class="active"><a href="#">Contact Us</a></li>
      <li class="active"><a href="#">About Us</a></li>

    <ul class="nav navbar-nav">
     
 <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown">Login As <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li class="drop"><a href="admin.php">Admin</a></li>
          <li class="drop"><a href="doctorlogin.php">Doctor</a></li>
         
        </ul>
      </li>
    </ul>
</ul>
  </div> 



<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="hospital.jpg" alt="Image">
        <div class="carousel-caption">
          <h1 style="color: red; font-weight: bold;" >located</h1>
          <h3 style="color: red; font-weight: bold;">At the heart of bhaktapur</h3>
        </div>      
      </div>

      <div class="item">
        <img src="report.jpg" alt="Image">
        <div class="carousel-caption">
          <h1 style="color: red; font-weight: bold;">Quality Reports</h1>
          <h3 style="color: red; font-weight: bold;">24 hours</h3>
        </div>      
      </div>

      <div class="item">
        <img src="tech.jpg" alt="Image">
        <div class="carousel-caption">
          <h1 style="color: red; font-weight: bold;">Advanced Technology</h1>
          <h3 style="color: red; font-weight: bold;">Our top priority</h3>
        </div>      
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>
  
<div class="container text-center" style="background-color: #D2B48C; ">    
  <h4>Mission: The main mission of the Hospital is to make the community healthy by providing affordable, reliable and quality health services. The fulfillment of this mission is easier and getting successful because of the involvement of the local community people.</h4><br>
  
</div><br>

<footer class="container-fluid text-center">
  <p>Quick Contact</p>
<p>Address: Sallaghari-1, Bhaktapur</p>

<p>Tel: 6612695, 6612705 ,9861937345</p>

<p>Email: info@iwamurahospital.com</p>

</footer>





</body>
</html>