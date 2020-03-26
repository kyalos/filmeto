

<?php
require('db.php');
session_start();

unset($_SESSION["messagefail3"]);
unset($_SESSION["messagefail1"]);
unset($_SESSION["messagefail2"]);
unset($_SESSION["messagesent"]);
unset($_SESSION["messagefail"]);

// If form submitted, insert values into the database.
$loginErr = $usernameErr = $emailErr= $successmsg1 ="" ;
if (empty($_POST['name'])){
	$_SESSION["messagefail3"] = "Please insert your name.";

                header("location: contactus.php"); 
  }

	if(empty($_POST['email'])){
		$_SESSION["messagefail2"] = "Please insert a valid email.";

                header("location: contactus.php");
     } 

		if(empty($_POST['message']))
		{
			 $_SESSION["messagefail1"] = "An empty message cannot be processed.";

                header("location: contactus.php");
		}




		$name = $_POST['name'];
			    $qemail = $_POST['email'];
			     $message = $_POST['message'];

		if(empty($name) || empty($qemail) || empty($message))
		{
			$_SESSION["messagefail1"] = "An empty field cannot be processed.";

                header("location: contactus.php");
		}
		else{
			$sql = "insert into contactus(name,email,message) values('$name','$qemail','$message')";


			if ($conn->query($sql) === TRUE) {

			    $_SESSION["messagesent"] = "Message sent successfully. A reply will be sent to your email";

			  	$com = "node ./email/index.js ".$name." ".$email." ".$message."";
              	$output = shell_exec($com);


                header("location: contactus.php");  

			} else {
			   $_SESSION["messagefail"] = "Error sending your message. Try again later.";
			 	
                header("location: contactus.php");    
			}
		}
 
?>
