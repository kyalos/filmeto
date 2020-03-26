<?php
session_start();
    if(isset($_SESSION['user_type_id']))
    {
      $ust = $_SESSION['user_type_id'];
      if($ust == 1)
      {
        header("location: ../home_logged.php");
      }
    }
  ?>


<!DOCTYPE html>
<html>
<head>
   <link rel="shortcut icon" type="image/png" href="../images/favicon.ico"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Filmeto | Admin home.</title>
<style>
body, html {
  height: 100%;
  margin: 0;
}

.container {
  /* The image used */
  background-image: url("../images/back.jpg");


  /* Full height */
  height: 100%; 
  margin-top: 5px;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
.container .btn {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  background-color: #555;
  color: white;
  font-size: 16px;
  padding: 12px 24px;
  border: none;
  cursor: pointer;
  border-radius: 5px;
  text-align: center;
}

.container .btn:hover {
  background-color: black;
}
.xlarge-font {
  text-align: center;
  font-size: 64px
}

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
  position: fixed;
  top: 0;
  width: 100%;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: orange;
}

.active {
  background-color: orange;
}

.column-66 {
  width: 100%;
}
@media screen and (max-width: 1000px) {
  .column-66 {
    width: 100%;
    text-align: center;
  }
  .container .btn
  {
    margin-top: 200px;
  }
}
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
  <?php include '../templates/nav_home_admin.php'; ?> 
 
</ul>

<div class="container">

<div style="float: right; margin-top: 10px; margin-right: 50px;">


</div>
  <div class="row">
    <div class="column-66">
      <center>
      	<div class="row" style="width: 50%;">
        

      </div>
    </center>
    </div>
    <div class="column-66">
      <div class="row">

      
      </div>      
    </div>
  </div>
</div>

<div class="footer">
    <div class="row">
      <button class="btn btn-success btn-block" id="previous">
        <span id="previous">

      <span class="w3-large"><i class="fa fa-backward" id="btn-previous" value="previous" disabled="disabled" style="font-size:48px;color:green;"></i></span>
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
      <span class="w3-large"><i class="fa fa-forward" id="btn_next" value="next" disabled="disabled" style="font-size:48px;color:green;"></i></span>
    </span>
  </button>
    </div>
  </div>



</body>
</html>
