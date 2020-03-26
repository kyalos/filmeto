<?php
// Initialize the session
session_start();
 
 //Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"])){
    $_SESSION['please_login'] = "Please Login!!";
    $_SESSION['current_url'] = "http://localhost/filmeto/upload_video.php";
    header("location: login.php");
exit;
}
?>

<?php

$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "filmeto";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $successmsg1 = $failedmsg1 ="";

extract($_POST);

$target_dir = "video/";

$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);



if(empty($upd))
{
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

if($imageFileType != "mp4" && $imageFileType != "avi" && $imageFileType != "mov" && $imageFileType != "3gp" && $imageFileType != "mpeg")
{
    $_SESSION["wrong_ft"] =  "File Format Not Suppoted";
} 

else
{

$video_path=$_FILES['fileToUpload']['name'];

$load_name = $_FILES['fileToUpload']['name'];



  $length = 10;
  $characters = '12346789';
  $charactersLength = strlen($characters);
  $randomString = '';
  for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[rand(0, $charactersLength - 1)];
  }
  $random_id = $randomString;


$sql = "insert into video(random_id,name,load_name) values('$random_id','$video_path','$load_name')";


if ($conn->query($sql) === TRUE) {

    $_SESSION["record_in_success"] = "Record updated successfully";  

} else {
   $_SESSION["record_in_failed"] = "Error updating record";
    
}


move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_file);

	$_SESSION["video_up_success"] = "uploaded ";

}

}
?>



<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Clarity | login</title>

  <!-- import css -->
   <link rel="stylesheet" type="text/css" href="css/login.css">
   <link rel="stylesheet" type="text/css" href="css/login_nav.css">
    <link rel="shortcut icon" type="image/png" href="images/favicon.ico"/>

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
      
      
<?php if(isset($_SESSION['record_in_success'])){
  $successmsg1 = $_SESSION['record_in_success'];
  $failedmsg1 = "";
} 
else
{
  $successmsg1 ="";
}
?>

<?php if(isset($_SESSION['record_in_failed'])){
  $failedmsg2 = $_SESSION['record_in_failed'];
} 
else
{
  $failedmsg2 ="";
}
?>

      
<?php if(isset($_SESSION['video_up_success'])){
  $successmsg2 = $_SESSION['video_up_success'];

} 
else
{
  $successmsg2 ="";
}
?>

<?php if(isset($_SESSION['wrong_ft'])){
  $failedmsg3 = $_SESSION['wrong_ft'];
} 
else
{
  $failedmsg3 ="";
}
?>

<?php if ($failedmsg2) {
  echo '<div class="alert danger" style ="height: 5px">
  <span class="closebtn" onclick="this.parentElement.style.display=&#39;none&#39;;">&times;</span><p class="palerts">'; echo $failedmsg2;  echo '</p>
</div>';
}?>

<?php if ($failedmsg1) {
  echo '<div class="alert danger" style ="height: 5px">
  <span class="closebtn" onclick="this.parentElement.style.display=&#39;none&#39;;">&times;</span><p class="palerts">'; echo $failedmsg1;  echo '</p>
</div>';
}?>

<?php if ($failedmsg3) {
  echo '<div class="alert danger" style ="height: 5px">
  <span class="closebtn" onclick="this.parentElement.style.display=&#39;none&#39;;">&times;</span><p class="palerts">'; echo $failedmsg3;  echo '</p>
</div>';
}?>

<?php if ($successmsg1) {
      
echo '<div class="alert success">
  <span class="closebtn" onclick="this.parentElement.style.display=&#39;none&#39;;">&times;</span><p class="palerts">'; echo $successmsg1;  echo '</p>
</div>';
 
} ?>

<?php if ($successmsg2) {
      
echo '<div class="alert success">
  <span class="closebtn" onclick="this.parentElement.style.display=&#39;none&#39;;">&times;</span><p class="palerts">'; echo $successmsg2;  echo '</p>
</div>';
 
} ?>
<div>

	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">


<label>Upload  Video</label>

<input type="file" name="fileToUpload"/>

<input type="submit" value="Upload" name="upd" style="
  width: 80%;
  background-color: orange;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer; ">

</form>




</div>
  </div><br><br><br><br><br><br><br>

  <div class="column-33">&nbsp;</div>


</div>

  </form>

</body>
</html>