<?php
session_start();

unset($_SESSION['please_login']);
    error_reporting(E_ALL);
    ini_set('display_errors',1);
    $conn = mysqli_connect('localhost','root','','filmeto');
    if(isset($_SESSION['username']))
    {

      $username = $_SESSION['username'];
    }
    else
    {
      $username = "Guest";
    }
	    $prj= mysqli_query($conn,"select * FROM users where username = '$username';") or die(mysqli_error($conn));
	            $record = array();
	            while($row = mysqli_fetch_assoc($prj)){
	                $record[] = $row;
	            }
    mysqli_close($conn);
?>


<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

  <!-- import css -->
  <link rel="stylesheet" type="text/css" href="css/search_extras.css">
   <link rel="stylesheet" type="text/css" href="css/search.css">
   <link rel="stylesheet" type="text/css" href="css/search_nav.css">
    <link rel="shortcut icon" type="image/png" href="images/favicon.ico"/>
    <title>Filmeto | About us</title>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
		.grid { 
	  display: grid;
	  grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
	  grid-gap: 20px;
	  align-items: stretch;
	  margin-top: 55px;
	  }
	.grid > article {
	  border: 1px solid #ccc;
	  box-shadow: 2px 2px 6px 0px  rgba(0,0,0,0.3);
	}
	.grid > article img {
	  max-width: 100%;
	}
</style>
</head>
<body>
  <div id="searchcustom">
<?php include 'templates/nav.php'; ?>
</ul>
</div> 
 <br>
 <br>
<br>
<div class="imgtitle">
</div>
<br style="line-height: 80%">
 
</body>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
* {
  box-sizing:border-box;
}


#content
{
    margin-top: 150px;
}

.main {
  background-color:#f1f1f1;
  padding:20px;
  float:left;
  width:100%; /* The width is 60%, by default */
}

/*.right {
  background-color:#f7f2c8;
  border-color: black;
  padding:20px;
  float:left;
  width:20%; /* The width is 20%, by default */
}*/

/* Use a media query to add a break point at 800px: */
@media screen and (max-width:800px) {
  .left, .main, .right {
    width:100%; /* The width is 100%, when the viewport is 800px or smaller */
  }
}
</style>
</head>
<body>
<div id="content">
     
    <div class="main" style="font-family: courier">
   	
   	<center><h1 class="xlarge-font" style="color: black;"><b>FILM<span style="color: orange;">E</span>TO</b></h1>
   	<h3 style="color: orange">Entertainment like no other</h3>
   	<p>filmeto is a company dedicated to provide high quality audio and video streaming services.</p></center>

   	<main class="grid">
   		<article>
   			<p>CEO</p>
   			<img src="images/ceo.jpg">
   			<h3>Angie Chan</h3>
   		</article>
   		<article>
   			<p>MARKETING DIRECTOR</p>
   			<img src="images/mkt.jpg">
   			<h3>Jackie Chan</h3>
   		</article>
   		<article>
   			<p>INNOVATIONS DIRECTOR</p>
   			<img src="images/inv.jpg">
   			<h3>Markello Chan</h3>
   		</article>
   		<article>
   			<p>CUSTOMER&nbsp;QUERIES DIRECTOR</p>
   			<img src="images/pp.jpg">
   			<h3>Jumper Chan</h3>
   		</article>
   		<article>
   			<p>COMMUNICATIONS&nbsp;DIRECTOR</p>
   			<img src="images/mkt.jpg">
   			<h3>Angelo D Chan</h3>
   		</article>
   	</main>
   
    </div>

    <div class="right">
     &nbsp;
    </div>

</div>
</body>
</html>
