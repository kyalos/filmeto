<?php session_start(); ?>
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Clarity | Contact us</title>

  <!-- import css -->
   <link rel="stylesheet" type="text/css" href="css/login.css">
   <link rel="stylesheet" type="text/css" href="css/login_nav.css">
    <link rel="shortcut icon" type="image/png" href="images/favicon.ico"/>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
  
  <!-- The App Section -->
<div class="container">
  <div class="row">
 <div class="column-22">&nbsp;</div>   

    <div class="column-66">
      
   
<div>
  <?php if(isset($_SESSION['messagesent'])){
  $successmsg1 = $_SESSION['messagesent'];
  
} 
else
{
  $successmsg1 ="";
}
?>

<div>
  <?php if(isset($_SESSION['messagefail'])){
  $failedmsg1 = $_SESSION['messagefail'];
  $successmsg1 = "";
} 
else
{
  $failedmsg1 ="";
}
?>

<?php if(isset($_SESSION['messagefail1'])){
  $failedmsg2 = $_SESSION['messagefail1'];
} 
else
{
  $failedmsg2 ="";
}
?>

<?php if(isset($_SESSION['messagefail2'])){
  $failedmsg3 = $_SESSION['messagefail2'];
} 
else
{
  $failedmsg3 ="";
}
?>

<?php if(isset($_SESSION['messagefail3'])){
  $failedmsg4 = $_SESSION['messagefail3'];
} 
else
{
  $failedmsg4 ="";
}
?>

<center><h3>CONTACT US</h3></center>
<?php if ($failedmsg2) {
  echo '<div class="alert danger" style ="height: 5px">
  <span class="closebtn" onclick="this.parentElement.style.display=&#39;none&#39;;">&times;</span><p class="palerts">'; echo $failedmsg2;  echo '</p>
</div>';
}?>

<?php if ($failedmsg3) {
  echo '<div class="alert danger" style ="height: 5px">
  <span class="closebtn" onclick="this.parentElement.style.display=&#39;none&#39;;">&times;</span><p class="palerts">'; echo $failedmsg3;  echo '</p>
</div>';
}?>

<?php if ($failedmsg4) {
  echo '<div class="alert danger" style ="height: 5px">
  <span class="closebtn" onclick="this.parentElement.style.display=&#39;none&#39;;">&times;</span><p class="palerts">'; echo $failedmsg4;  echo '</p>
</div>';
}?>

<?php if ($failedmsg1) {
  echo '<div class="alert danger" style ="height: 5px">
  <span class="closebtn" onclick="this.parentElement.style.display=&#39;none&#39;;">&times;</span><p class="palerts">'; echo $failedmsg1;  echo '</p>
</div>';
}?>
<?php if ($successmsg1) {
      
echo '<div class="alert success">
  <span class="closebtn" onclick="this.parentElement.style.display=&#39;none&#39;;">&times;</span><p class="palerts">'; echo $successmsg1;  echo '</p>
</div>';
 
} ?>
	  <form action="send_messages.php" method="POST">  
	  <!--   <label for="casename"><b>Case name</b></label><br>
	    <input type="text" id="casename" name="casename" placeholder="Your Case name.."><br>
	     <span class="error">* <?php echo $casenameErr;?></span> <br> -->

	    <label for="officers"><b>Name</b></label><br>
	    <input type="text" id="officers" name="name" placeholder="Your name here..." autocomplete="off"><br>
	     <br>


	    <label for="officers"><b>Email</b></label><br>
	    <input type="email" id="officers" name="email" placeholder="Your email here..." autocomplete="off"><br>
	     <br>

	    <label for="officers"><b>Message</b></label><br>
	    <input type="text" id="officers" name="message" placeholder="Your Message here..." autocomplete="off"><br>
	     <br>

	<input type="submit" value="Submit Message" style="
	  width: 80%;
	  background-color: orange;
	  color: white;
	  padding: 14px 20px;
	  margin: 8px 0;
	  border: none;
	  border-radius: 4px;
	  cursor: pointer; ">


	  <br><br><br><br><br><br><br>

	  <div class="column-33">&nbsp;</div>

<p><span>Facebook   <i class="fa fa-facebook-official" aria-hidden="true"></i>
</span>Filemeto     |<span>Instagram  <i class="fa fa-instagram" aria-hidden="true"></i> Filmeto    </span>|<span>Twitter  <i class="fa fa-twitter-square" aria-hidden="true"></i> Filmeto</span></p>
	  </form>
	  


</body>
</html>