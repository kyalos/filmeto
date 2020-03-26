<?php

if(isset($_SESSION["loggedin"])){
echo '
<ul>

 <li><img src="images/logo.png" style="width: 53px;height: 40px; padding-top: 4px;"></li>	
 <li><a href="home.php">Home</a></li>
 <li><a href="home_logged.php">Videos and Movies</a></li>
 <li><a href="play_audio.php">Songs and Audio</a></li>
 <li><a href="pricing.php">Pricing</a></li>
 <li><a href="upload_video.php">Upload video</a></li>
 <li><a href="upload_audio.php">Upload audio</a></li>
 <li><a href="faq.php">FAQ</a></li>
 <li><a href="about_us.php">About us</a></li>
 <li><a href="contactus.php">Contact us</a></li>
 <li><a href="return_policy.php">Return policy</a></li>
 
 <li style="float:right"><a class="active" href="logout.php">Logout</a></li>

	<li style="float:right; color: white;"><a class=""><b>';?><?php echo htmlspecialchars($_SESSION["username"]); echo ' </b></a></li>';
}

else
{

	echo '
	<ul>

 	<li><img src="images/logo.png" style="width: 53px;height: 40px; padding-top: 4px;"></li>
	<li><a href="home.php">Home</a></li>
	<li><a href="pricing.php">Pricing</a></li>
	<li><a href="faq.php">FAQ</a></li>
 <li><a href="about_us.php">About us</a></li>
	<li><a href="contactus.php">Contact us</a></li>
 <li><a href="return_policy.php">Return policy</a></li>

	<li><a href="faq.php">FAQ </a></li>
	<li style="float:right"><a class="active" href="login.php">Login</a></li>

	<li style="float:right"><a href="create_account.php">Create account</a></li>
	'
	;	
}
  


?>