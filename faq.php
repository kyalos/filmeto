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

<?php

    error_reporting(E_ALL);
    ini_set('display_errors',1);
    $conn = mysqli_connect('localhost','root','','filmeto');



             $sus= mysqli_query($conn,"select * FROM faq") or die(mysqli_error($conn));

            $trk = array();
            while($row2 = mysqli_fetch_assoc($sus)){
                $trk[] = $row2;
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
    <title>Filmeto | FAQ</title>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
  width:80%; /* The width is 60%, by default */
}

.right {
  background-color:#f7f2c8;
  border-color: black;
  padding:20px;
  float:left;
  width:20%; /* The width is 20%, by default */
}

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
     
	<center><h3>FREQUENTLY ASKED QUESTIONS</h3></center>

    <div class="main" style="font-family: courier">
    
       <?php foreach($trk as $nes){?>
      <div style="float: left;">
       <i class="fa fa-ravelry" aria-hidden="true"></i>
       <h3>QUESTION</h3><p><?php echo $nes['question'];?></p><br>
        <h3 style="margin-top:-18px;">ANSWER</h3><p style="margin-top: -16px;"><?php echo $nes['answer'];?></p></div>
    
       <?php } ?>

   
    </div>

    <div class="right">
     &nbsp;
    </div>

</div>

</body>

</html>
