

<?php
require('db.php');
session_start();
// If form submitted, insert values into the database.
$loginErr = $usernameErr = $passwordErr= $successmsg1 ="" ;
if (isset($_POST['username'])){
        // removes backslashes
  $username = $_POST['username'];
    $password = $_POST['password'];
 //Checking is user existing in the database or not
//         $query = "SELECT * FROM `users` WHERE username='$username'
// and password='".encryption$password)."'";

    $query = "SELECT * FROM users WHERE username='$username' LIMIT 1";
     
    //echo $_POST['password'];
$shapassword = hash( 'sha256', $password );



 $result = mysqli_query($conn,$query) or die(mysql_error());
 $rows = mysqli_num_rows($result);
 $row = mysqli_fetch_assoc($result);


        if($rows==1){
             if ($shapassword == $row['passw']) {
        $_SESSION['username'] = $username;
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['email'] = $row['email'];
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['user_type_id'] = $row['user_type_id'];


          
    if(isset($_SESSION["user_type_id"])){
                header("location: ../filmeto/admin/home.php");
               $_SESSION['welcome'] = "Welcome to Clarity"; 
              }
              else if(isset($_SESSION["current_url"])){
               
               $current_url = $_SESSION["current_url"];
                header("location: $current_url");
              }
              else
              {
                $_SESSION['welcome'] = "Welcome to Filmeto";

                header("location: home_logged.php"); 
              }
              exit;

      
        }
        else
        {
           $loginErr = "Invalid credentials1";
            $_SESSION['failedlogin'] = "Invalid credentials";    
         }
     }
         else
         {
            $loginErr = "Invalid credentials2";
            $_SESSION['failedlogin'] = "Invalid credentials";    
        }
    }
    
    else{
        $officeridErr = "*";
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
 <?php include 'templates/nav_home.php'; ?> 
 
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
  <?php if(isset($_SESSION['please_login'])){
  $failedmsg1 = $_SESSION['please_login'];
  $successmsg1 = "";
} 
else
{
  $failedmsg1 ="";
}
?>

<?php if(isset($_SESSION['failedlogin'])){
  $failedmsg2 = $_SESSION['failedlogin'];
} 
else
{
  $failedmsg2 ="";
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
<?php if ($successmsg1) {
      
echo '<div class="alert success">
  <span class="closebtn" onclick="this.parentElement.style.display=&#39;none&#39;;">&times;</span><p class="palerts">'; echo $successmsg1;  echo '</p>
</div>';
 
} ?>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">  
  <!--   <label for="casename"><b>Case name</b></label><br>
    <input type="text" id="casename" name="casename" placeholder="Your Case name.."><br>
     <span class="error">* <?php echo $casenameErr;?></span> <br> -->

    <label for="officers"><b>Username</b></label><br>
    <input type="text" id="officers" name="username" placeholder="Username here..." autocomplete="off"><br>
    <span class="error"><?php echo $usernameErr;?></span> <br>

    <label for="passwd"><b>Password</b></label><br>
    <input type="password" id="passwd" name="password" placeholder="Password here..." autocomplete="off"><br>
    <span class="error">* <?php echo $passwordErr;?></span><br>
    


<input type="submit" value="Login" style="
  width: 80%;
  background-color: orange;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer; ">


<a href="create_account.php" style="text-decoration: none; color: red"><h4>Click here to create an account</h4></a>
</div>
  </div><br><br><br><br><br><br><br>

  <div class="column-33">&nbsp;</div>


</div>


  </form>


</body>
</html>