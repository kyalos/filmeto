<?php
// Initialize the session
session_start();
 
 //Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"])){
    $_SESSION['please_login'] = "Please Login!!";
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

  if (isset($_GET['name'])) {

$nn = $_GET['name'];


    error_reporting(E_ALL);
    ini_set('display_errors',1);
    $conn = mysqli_connect('localhost','root','','filmeto');

    $prj= mysqli_query($conn,"select id,random_id, load_name, SUBSTRING_INDEX(name, ' ', 3) as nn from video where name LIKE '%$nn%'") or die(mysqli_error($conn));
            $tabs = array();
            while($row = mysqli_fetch_assoc($prj)){
                $tabs[] = $row;
            }
    mysqli_close($conn);
  }
?>


<!DOCTYPE html>
<html>
<head>
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
.text {
  padding: 0 20px 20px;
}
.text > button {
  background: gray;
  border: 0;
  color: white;
  padding: 10px;
  width: 100%;
  }
  /* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.flex-container{
    width: 80%;
    min-height: 300px;
    margin: 0 auto;
    display: -webkit-flex; /* Safari */     
    display: flex; /* Standard syntax */
}
.flex-container .column{
    padding: 10px;
    background: #ffffff;
    -webkit-flex: 1; /* Safari */
    -ms-flex: 1; /* IE 10 */
    flex: 1; /* Standard syntax */
}
.flex-container .column.bg-alt{
    background: #e5e5e5;
}


/* Add Animation */
@-webkit-keyframes slideIn {
  from {bottom: -300px; opacity: 0} 
  to {bottom: 0; opacity: 1}
}

@keyframes slideIn {
  from {bottom: -300px; opacity: 0}
  to {bottom: 0; opacity: 1}
}

@-webkit-keyframes fadeIn {
  from {opacity: 0} 
  to {opacity: 1}
}

@keyframes fadeIn {
  from {opacity: 0} 
  to {opacity: 1}
}
</style>
   <link rel="stylesheet" type="text/css" href="../css/grid.css">
   <link rel="stylesheet" type="text/css" href="../css/grid_nav.css">
    <link rel="shortcut icon" type="image/png" href="../images/favicon.ico"/>

  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/moment.min.js"></script>
  <script type="text/javascript" src="js/daterangepicker.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/daterangepicker.css" />

    <link rel="stylesheet" type="text/css" href="../css/toast.css">
   <title>Clarity | </title>
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
<div class="container" style="margin-top: 50px;">
<div class="row">
&nbsp;
<!-- something should be here -->
</div>
</div>

    <center><input type='text' id='link_id' style="width: 50%; height: 30px; margin-top: -25px;" placeholder="Search">
   <span><input type='button' id='link' class="active" value='Search' onClick='javascript:goTo()' style="width: 10%;height: 30px; margin-top: -20px"></span></center>
<main class="grid">

  <?php foreach($tabs as $tb){?>
      
      <div onclick="getComments<?php echo $tb['id'];?>(<?php echo $tb['id'];?>)">
        <article id="myBtn<?php echo $tb['random_id'];?>">
          <h3><b><center><?php echo $tb['nn'];?></center></b></h3>
          <video id="video<?php echo $tb['random_id'];?>" width="225" style="cursor: pointer;" onmouseover="play()" onmouseout="pause()" controls>
        <source src="../video/<?php echo $tb['load_name'];?>" type="video/mp4">
        Your browser does not support HTML5 video.
      </video>
        <div class="text">
          <button><b><?php echo $tb['nn'];?></b></button>
        </div>
      </a>
      </article>
    </div>
        <!-- The Modal -->
    <div id="myModal<?php echo $tb['random_id'];?>" class="modal">

      <!-- Modal content -->
      <div class="modal-content">

            <span class="close<?php echo $tb['random_id'];?>m" style="color: #aaaaaa;float: right;font-size: 28px;font-weight: bold;hover,focus {color: #000;text-decoration: none;cursor: pointer;}">&times;</span>
              <div class="flex-container">
                <div class="column">
                    <video id="video<?php echo $tb['random_id'];?>m" width="500" height="300" onclick="playPause2()" controls>
                      <track kind="" src="">
                    <source src="../video/<?php echo $tb['load_name'];?>" type="video/mp4">
                    Your browser does not support HTML5 video.
                  </video>
                </div>
                <div class="column bg-alt">
                  <center><p>Comments</p></center>
                  <div class="ex3">
                    <div id="comments<?php echo $tb['id'];?>"></div>
                  </div>
                </div>  
              </div>
           
            <label for="officers"><b>Leave a comment</b></label><br>
            <input type="text" id="video_comment<?php echo $tb['id'];?>" name="video_comment" placeholder="comments here..." autocomplete="off">

            <center><input type="submit" value="Send comment" style="
              width: 50%;
              background-color: orange;
              color: white;
              padding: 14px 20px;
              margin: 8px 0;
              border: none;
              border-radius: 4px;
              cursor: pointer; " onclick= "sendcomment<?php echo $tb['id'];?>(<?php echo $tb['id'];?>)"></center>
            <br>
          
        </div>

    </div>
  
      <script> 
      var myVideo<?php echo $tb['random_id'];?> = document.getElementById("video<?php echo $tb['random_id'];?>"); 

      function playPause() { 
        if (myVideo<?php echo $tb['random_id'];?>.paused) 
          myVideo<?php echo $tb['random_id'];?>.play(); 
        else 
          myVideo<?php echo $tb['random_id'];?>.pause(); 
      } 


      //video2

      var myVideo<?php echo $tb['random_id'];?>m = document.getElementById("video<?php echo $tb['random_id'];?>m"); 

      function playPause2() { 
        if(myVideo<?php echo $tb['random_id'];?>.play())
          myVideo<?php echo $tb['random_id'];?>.pause();

          if (myVideo<?php echo $tb['random_id'];?>m.paused()) 
            myVideo<?php echo $tb['random_id'];?>m.play(); 
          else 
            myVideo<?php echo $tb['random_id'];?>m.pause(); 
        }

        myVideo<?php echo $tb['random_id'];?>m.addEventListener("playing", function() {
          myVideo<?php echo $tb['random_id'];?>.pause();
        });

      </script> 

       <script>
      // Get the modal
      var modal<?php echo $tb['random_id'];?> = document.getElementById("myModal<?php echo $tb['random_id'];?>");

      // Get the button that opens the modal
      var btn<?php echo $tb['random_id'];?> = document.getElementById("myBtn<?php echo $tb['random_id'];?>");

      // Get the <span> element that closes the modal
      var span<?php echo $tb['random_id'];?>m = document.getElementsByClassName("close<?php echo $tb['random_id'];?>m")[0];

      // When the user clicks the button, open the modal 

      btn<?php echo $tb['random_id'];?>.onclick = function() {
        modal<?php echo $tb['random_id'];?>.style.display = "block";
      }

      // When the user clicks on <span> (x), close the modal
      span<?php echo $tb['random_id'];?>m.onclick = function() {
        modal<?php echo $tb['random_id'];?>.style.display = "none";

        myVideo<?php echo $tb['random_id'];?>m.pause(); 
      }

      // When the user clicks anywhere outside of the modal, close it
      // window.onclick = function(event) {
      //   if (event.target == modal<?php echo $tb['random_id'];?>) {
      //     modal<?php echo $tb['random_id'];?>.style.display = "none";
      //   }
      // }
      </script>

    <script>
      const sendcomment<?php echo $tb['id'];?> = (id) => {

        let video_comment<?php echo $tb['id'];?> = document.querySelector('#video_comment<?php echo $tb['id'];?>');
        
        let params = {
          id: id,
          video_comment: video_comment<?php echo $tb['id'];?>.value
        };
        let options = {
          method: "POST",
          headers: {
            "Content-Type": "application/json"
          },
          body: JSON.stringify(params)
        };
        let url = "/filmeto/send_comment.php";
        fetch(url, options)
            .then(resp => resp.json())
            .then(data => {
              if(data.status == 'success'){
                
                new Toast({
                  message: data.message,
                  type: data.status
              });


              } else {

                new Toast({
                  message: data.message,
                  type: data.status
              });

              }
            });
      };
    </script>
    <script>
      const getComments<?php echo $tb['id'];?> = (id) => {
         let params = {
          id: id
        };
        console.log(params);

        let options = {
          method: "POST",
          headers: {
            "Content-Type": "application/json"
          },
          body: JSON.stringify(params)
        };

  let url = "/filmeto/get_comments.php";
    fetch(url,options)
      .then(resp => resp.json())
      .then(data => {
        if(data.status == 'success' && data.data){
            console.log(data.data);
            

          let comments<?php echo $tb['id'];?> = document.querySelector('#comments<?php echo $tb['id'];?>');

          data.data.forEach(element => {

             comments<?php echo $tb['id'];?>.innerHTML+=`
            <u><b><p style="color:blue">`+element.username+`</p></b></u>
            <p>`+element.video_comment+`</p>
            <hr>

            `
          });
        }
        else
        {

          let comments<?php echo $tb['id'];?> = document.querySelector('#comments<?php echo $tb['id'];?>');
           comments<?php echo $tb['id'];?>.innerHTML+=`
            <p>No comments</p>`;
        }
      });
};

          

    </script>
  
  <?php } ?> 
<script>


function goTo()
{
    location.href = "get_video.php?name="+document.getElementById('link_id').value;
}
</script>


</main>


</body>
<script src="../js/toast.js"></script>

</html>
