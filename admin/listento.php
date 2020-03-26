
<?php
// Initialize the session
session_start();
 
 //Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"])){
    $_SESSION['please_login'] = "Please Login!!";
    $_SESSION['current_url'] = "http://localhost/filmeto/play_audio.php";
    header("location: login.php");
exit;
}
?>

<?php
    error_reporting(E_ALL);
    ini_set('display_errors',1);
    $conn = mysqli_connect('localhost','root','','filmeto');
    $username = $_SESSION['username'];
    $prj= mysqli_query($conn,"select * FROM users where username = '$username';") or die(mysqli_error($conn));
            $record = array();
            while($row = mysqli_fetch_assoc($prj)){
                $record[] = $row;
            }
    mysqli_close($conn);
?>

<?php

unset($_SESSION['plan_created']);
unset($_SESSION['pricing_message']);
unset($_SESSION['please_login']);
    error_reporting(E_ALL);
    ini_set('display_errors',1);
    $conn = mysqli_connect('localhost','root','','filmeto');

    $prj= mysqli_query($conn,"select * from audio") or die(mysqli_error($conn));
            $record = array();
            while($row = mysqli_fetch_assoc($prj)){
                $record[] = $row;
            }

              $user_id = $_SESSION['user_id'];

    $fkj= mysqli_query($conn,"select upto FROM pricing where user_id = '$user_id' order by id desc limit 1 ;") or die(mysqli_error($conn));
            $close_date = array();
            while($row3 = mysqli_fetch_assoc($fkj)){
                $close_date[] = $row3;
                $der = implode($close_date[0]);
            }
            $today = strtotime(date("Y-m-d h:i:sa"));
            
            $p1 = strtotime($der);
            
            $dminus = $p1 - $today;
            if($dminus <= 0)
            {
              $_SESSION["pricing_message"] = "Your plan has expired. Please select a plan convenient to you below.";
              header("location: pricing.php");
            }

    mysqli_close($conn);
?>


<!DOCTYPE html>
<html>
<head>
 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/1.3.2/wavesurfer.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="../js/app.js"></script>
   <link rel="stylesheet" type="text/css" href="../css/grid.css">
   <link rel="stylesheet" type="text/css" href="../css/grid_nav.css">
    <link rel="shortcut icon" type="image/png" href="../images/favicon.ico"/>

  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/moment.min.js"></script>
  <script type="text/javascript" src="js/daterangepicker.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/daterangepicker.css" />
   <title>Filmeto | Audio</title>

<style>
	.footer {
   position: fixed;
   left: 0;
   bottom: 0;
   height: auto;
   width: 100%;
   background-color: black;
   color: white;
   text-align: center;
}
</style>
</head>
<body>
 <?php include '../templates/nav_admin.php'; ?> 

</ul>
 <br>
 <br>
<br>
<div class="imgtitle">
</div>
<br style="line-height: 80%">
  <!-- Top navigation -->
   
 
<!-- <?php include 'templates/event_alerts.php'; ?> -->
<div class="container" style="margin-top: -15px;">
<div class="row">
&nbsp;
<!-- something should be here -->
</div>
</div>
	

<center><input type='text' id='link_id' style="width: 50%; height: 30px; margin-top: 60px;" placeholder="Search">
   <span><input type='button' id='link' class="active" value='Search' onClick='javascript:goTo()' style="width: 10%;height: 30px; margin-top: 60px"></span></center>

  <main class="grid">

  		<div class="list-group" id="playlist">
  
        <?php foreach($record as $rec){?>
          
           <a href="../audio/<?php echo $rec['name'];?>" class="list-group-item" style= "text-decoration: none; color: black;"> <h3><img src="../images/<?php echo $rec['image'];?>" style="height: 50px; width: 50px; float: left;"></span><span style="font-size:20px"><?php echo $rec['name'];?></h3>
           
            </a>
           <!--  <span class="badge">0:21</span> -->
           &nbsp;
            <hr>
          <?php } ?>

      </div>
     

</main>


<div class="footer">
    <div class="row">
      <button class="btn btn-success btn-block" id="previous">
        <span id="previous">

      <span class="w3-large"><i class="fa fa-backward" id="btn-previous" value="previous" disabled="disabled" style="font-size:48px;color:orange;"></i></span>
    </span>
  </button>
      <button class="btn btn-success btn-block" id="playPause">
          <span id="play">
              <span class="w3-large"><i class="fa fa-play-circle" id="btn-play" value="play" disabled="disabled" style="font-size:48px;color:green;"></i></span>
          </span>

          <span id="pause" style="display: none">
              <span class="w3-large"><i class="fa fa-pause-circle" id="btn-pause" value="pause" disabled="disabled" style="font-size:48px;color:lightblue;"></i></span>
              
          </span>
      </button>
      <button class="btn btn-success btn-block" id="next">
          <span id="next">
      <span class="w3-large"><i class="fa fa-forward" id="btn_next" value="next" disabled="disabled" style="font-size:48px;color:orange;"></i></span>
    </span>
  </button>
    </div>
  </div>

  <div class="row" style="position: relative; z-index: -1; display: none;">
      <div id="waveform" >
            <!-- Here be waveform -->
        </div>
    </div>

</body>

<script>
function goTo()
{
    location.href = "get_audio.php?song="+document.getElementById('link_id').value;
}
</script>


</html>
