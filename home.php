<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(isset($_SESSION["loggedin"])){
    header("location: home_logged.php");
    exit;
}
else
{
  $_SESSION['profile_picture'] = "images/notlogged.png";
}
?>

<!DOCTYPE html>
<html>
<head>
   <link rel="shortcut icon" type="image/png" href="images/favicon.ico"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Filmeto | Official streaming site.</title>
<style>
body, html {
  height: 100%;
  margin: 0;
}

.container {
  /* The image used */
  background-image: url("images/back.jpg");


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
  <?php include 'templates/nav_home.php'; ?> 
 
</ul>

<div class="container">

<div style="float: right; margin-top: 10px; margin-right: 50px;">
<canvas id="canvas" width="170" height="140"
style="background-color:none">
</canvas>

</div>
  <div class="row">
    <div class="column-66">
      <center><div class="row" style="width: 50%;">
        <div style="background-color: orange;">
        <center><h1 class="xlarge-font" style="color: white;"><b>FILM<span style="color: black;">E</span>TO</b></h1>
        <h3 style="color: white">Entertainment like no other</h3></center>
      </div>
      </div>
    </center>
    </div>
    <div class="column-66">
      <div class="row">
      <center><a href="login.php"><button class="btn" style="background-color: orange; width: 30%; margin-top: 90px; font-size: 20px;">Login</button></a></center>
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


<script>
var canvas = document.getElementById("canvas");
var ctx = canvas.getContext("2d");
var radius = canvas.height / 2;
ctx.translate(radius, radius);
radius = radius * 0.90
setInterval(drawClock, 1000);

function drawClock() {
  drawFace(ctx, radius);
  drawNumbers(ctx, radius);
  drawTime(ctx, radius);
}

function drawFace(ctx, radius) {
  var grad;
  ctx.beginPath();
  ctx.arc(0, 0, radius, 0, 2*Math.PI);
  ctx.fillStyle = 'white';
  ctx.fill();
  grad = ctx.createRadialGradient(0,0,radius*0.95, 0,0,radius*1.05);
  grad.addColorStop(0, '#333');
  grad.addColorStop(0.5, 'white');
  grad.addColorStop(1, '#333');
  ctx.strokeStyle = grad;
  ctx.lineWidth = radius*0.1;
  ctx.stroke();
  ctx.beginPath();
  ctx.arc(0, 0, radius*0.1, 0, 2*Math.PI);
  ctx.fillStyle = '#333';
  ctx.fill();
}

function drawNumbers(ctx, radius) {
  var ang;
  var num;
  ctx.font = radius*0.15 + "px arial";
  ctx.textBaseline="middle";
  ctx.textAlign="center";
  for(num = 1; num < 13; num++){
    ang = num * Math.PI / 6;
    ctx.rotate(ang);
    ctx.translate(0, -radius*0.85);
    ctx.rotate(-ang);
    ctx.fillText(num.toString(), 0, 0);
    ctx.rotate(ang);
    ctx.translate(0, radius*0.85);
    ctx.rotate(-ang);
  }
}

function drawTime(ctx, radius){
    var now = new Date();
    var hour = now.getHours();
    var minute = now.getMinutes();
    var second = now.getSeconds();
    //hour
    hour=hour%12;
    hour=(hour*Math.PI/6)+
    (minute*Math.PI/(6*60))+
    (second*Math.PI/(360*60));
    drawHand(ctx, hour, radius*0.5, radius*0.07);
    //minute
    minute=(minute*Math.PI/30)+(second*Math.PI/(30*60));
    drawHand(ctx, minute, radius*0.8, radius*0.07);
    // second
    second=(second*Math.PI/30);
    drawHand(ctx, second, radius*0.9, radius*0.02);
}

function drawHand(ctx, pos, length, width) {
    ctx.beginPath();
    ctx.lineWidth = width;
    ctx.lineCap = "round";
    ctx.moveTo(0,0);
    ctx.rotate(pos);
    ctx.lineTo(0, -length);
    ctx.stroke();
    ctx.rotate(-pos);
}
</script>

</body>
</html>
