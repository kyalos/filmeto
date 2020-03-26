
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
  <style>
.grid { 
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
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

.modal1 {
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

.modal2 {
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

/* The Close Button */
.close1 {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close1:hover,
.close1:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

/* The Close Button */
.close2 {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close2:hover,
.close2:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
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
   <link rel="stylesheet" type="text/css" href="css/grid.css">
   <link rel="stylesheet" type="text/css" href="css/grid_nav.css">
    <link rel="shortcut icon" type="image/png" href="images/favicon.ico"/>

   <title>Clarity | </title>
</head>
<body>
 <?php include 'templates/nav.php'; ?> 

</ul> 
 <br>
 <br>
<br>
<div class="imgtitle">
</div>
<br style="line-height: 80%">
  <!-- Top navigation -->
   

<div class="container" style="margin-top: 50px;">
<div class="row">
&nbsp;

<?php $successmsg1 ="";?>



<?php if(isset($_SESSION['excees_amount'])){
  $failedmsg6 = $_SESSION['excees_amount'];
} 
else
{

  $failedmsg6 ="";
}
?>

<?php if(isset($_SESSION['plan_failed'])){
  $failedmsg1 = $_SESSION['plan_failed'];
  $successmsg1 = "";
} 
else
{

  $failedmsg1 ="";
}
?>

<?php if(isset($_SESSION['wrongpass'])){
  $failedmsg2 = $_SESSION['wrongpass'];
  
} 
else
{

  $failedmsg2 ="";
}
?>

<?php if(isset($_SESSION['plan_created'])){
  $successmsg1 = $_SESSION['plan_created'];
  $failedmsg1 = "";
} 
else
{
  $failedmsg1 ="";
}
?>



<?php if(isset($_SESSION['pricing_message'])){
  $failedmsg3 = $_SESSION['pricing_message'];
  
} 
else
{

  $failedmsg3 ="";
}
?>


<?php if ($failedmsg1) {
  echo '<div class="alert" style="height: 10px;" >
  <span class="closebtn" onclick="this.parentElement.style.display=&#39;none&#39;;">&times;</span><p>'; echo $failedmsg1;  echo '</p>
</div>';
}?>

<?php if ($failedmsg2) {
  echo '<div class="alert" style="height: 10px;" >
  <span class="closebtn" onclick="this.parentElement.style.display=&#39;none&#39;;">&times;</span><p>'; echo $failedmsg2;  echo '</p>
</div>';
}?>

<?php if ($failedmsg3) {
  echo '<div class="alert" style="height: 15px;" >
  <span class="closebtn" onclick="this.parentElement.style.display=&#39;none&#39;;">&times;</span><p>'; echo $failedmsg3;  echo '</p>
</div>';
}?>

<?php if ($failedmsg6) {
  echo '<div class="alert" style="height: 15px;" >
  <span class="closebtn" onclick="this.parentElement.style.display=&#39;none&#39;;">&times;</span><p>'; echo $failedmsg6;  echo '</p>
</div>';
}?>

<?php if ($successmsg1) {
      
echo '<div class="alert success">
  <span class="closebtn" onclick="this.parentElement.style.display=&#39;none&#39;;">&times;</span><p class="palerts">'; echo $successmsg1;  echo '</p>
</div>';
 
} ?>

<!-- something should be here -->
</div>
</div>

  

  <main class="grid">

  
        <article>
          <h3 style="font-size: 30px; color: blue"><b><center>Daily</center></b></h3>
		      <center><p>*24 hours subscription</p></center>
          <center><p style="font-size: 20px">40<span>Ksh</span></p></center>	   
        <div class="text">
          <button style="background-color: orange" id="myBtn" ><b>Subscribe</b></button>
        </div>
      </a>
      </article>
       <article>
          <h3 style="font-size: 30px; color: blue"><b><center>Monthly</center></b></h3>
          <center><p>*30 day subscription</p></center>
          <center><p style="font-size: 20px">900<span>Ksh</span></p></center>    
        <div class="text">
          <button style="background-color: #ff0000" id="myBtn1"><b>Subscribe</b></button>
        </div>
      </a>
      </article>
       <article>
          <h3 style="font-size: 30px; color: blue"><b><center>Yearly</center></b></h3>
          <center><p>*One year subscription</p></center>
          <center><p style="font-size: 20px">8500<span>Ksh</span></p></center>    
        <div class="text">
          <button style="background-color: #00ffae" id="myBtn2"><b>Subscribe</b></button>
        </div>
      </a>
      </article>

</main>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <h3 style="font-size: 30px; color: blue"><b><center>Daily</center></b></h3>
    <form action="create_plan.php" method="POST" id="">  
        
        <label for="cd"><b>Package</b></label><br>
        <input type="text" id="cd" name="package" placeholder="Card number here..." autocomplete="off" value="daily" readonly><br>

        <label for="cd"><b>Credit Card number</b></label><br>
        <input type="text" id="cd" name="card_number" placeholder="Card number here..." autocomplete="off"><br>
        

        <label for="amt"><b>Amount</b></label><br>
        <input type="number" id="amt" name="amount" placeholder="Amount here..." autocomplete="off" style="width: 100%"><br>
        
        <label for="passwd"><b>Filmeto password</b></label><br>
        <input type="password" id="passwd" name="passw" placeholder="Amount here..." autocomplete="off" style="width: 100%"><br>
        


    <center><input type="submit" value="Submit" style="
      width: 80%;
      background-color: orange;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      border-radius: 4px;
      cursor: pointer; " id=""></center>

    </div>
      </div><br><br><br><br><br><br><br>

      <div class="column-33">&nbsp;</div>


    </div>

      </form>
  </div>

</div>


<!-- The Modal -->
<div id="myModal1" class="modal1">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close1">&times;</span>
    <h3 style="font-size: 30px; color: blue"><b><center>Monthly</center></b></h3>
     <form action="create_plan.php" method="POST" id="">  
      

        <label for="cd"><b>Package</b></label><br>
        <input type="text" id="cd" name="package" placeholder="Card number here..." autocomplete="off" value="monthly" readonly><br>

        <label for="cd"><b>Credit Card number</b></label><br>
        <input type="text" id="cd" name="card_number" placeholder="Card number here..." autocomplete="off"><br>
        

        <label for="amt"><b>Amount</b></label><br>
        <input type="number" id="amt" name="amount" placeholder="Amount here..." autocomplete="off" style="width: 100%"><br>
        
        <label for="passwd"><b>Filmeto password</b></label><br>
        <input type="password" id="passwd" name="passw" placeholder="Amount here..." autocomplete="off" style="width: 100%"><br>
        
        


    <center><input type="submit" value="Submit" style="
      width: 80%;
      background-color: orange;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      border-radius: 4px;
      cursor: pointer; " id=""></center>

    </div>
      </div><br><br><br><br><br><br><br>

      <div class="column-33">&nbsp;</div>


    </div>

      </form>
  </div>

</div>


<!-- The Modal -->
<div id="myModal2" class="modal2">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close2">&times;</span>
    <h3 style="font-size: 30px; color: blue"><b><center>Yearly</center></b></h3>
     <form action="create_plan.php" method="POST" id="">  
      
       
        <label for="cd"><b>Package</b></label><br>
        <input type="text" id="cd" name="package" placeholder="Card number here..." autocomplete="off" value="yearly" readonly><br>

        <label for="cd"><b>Credit Card number</b></label><br>
        <input type="text" id="cd" name="card_number" placeholder="Card number here..." autocomplete="off"><br>
        

        <label for="amt"><b>Amount</b></label><br>
        <input type="number" id="amt" name="amount" placeholder="Amount here..." autocomplete="off" style="width: 100%"><br>
        
        <label for="passwd"><b>Filmeto password</b></label><br>
        <input type="password" id="passwd" name="passw" placeholder="Amount here..." autocomplete="off" style="width: 100%"><br>
               


   <center><input type="submit" value="Submit" style="
      width: 80%;
      background-color: orange;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      border-radius: 4px;
      cursor: pointer; " id=""></center>

    </div>
      </div><br><br><br><br><br><br><br>

      <div class="column-33">&nbsp;</div>


    </div>

      </form>
      
  </div>

</div>


</body>


<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

<script>
// Get the modal
var modal1 = document.getElementById("myModal1");

// Get the button that opens the modal
var btn1 = document.getElementById("myBtn1");

// Get the <span> element that closes the modal
var span1 = document.getElementsByClassName("close1")[0];

// When the user clicks the button, open the modal 
btn1.onclick = function() {
  modal1.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span1.onclick = function() {
  modal1.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal1) {
    modal1.style.display = "none";
  }
}
</script>

<script>
// Get the modal
var modal2 = document.getElementById("myModal2");

// Get the button that opens the modal
var btn2 = document.getElementById("myBtn2");

// Get the <span> element that closes the modal
var span2 = document.getElementsByClassName("close2")[0];

// When the user clicks the button, open the modal 
btn2.onclick = function() {
  modal2.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span2.onclick = function() {
  modal2.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal2) {
    modal2.style.display = "none";
  }
}
</script>

</html>
