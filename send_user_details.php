

<?php
require('db.php');
session_start();

unset($_SESSION["messagefail7"]);
unset($_SESSION["messagefail6"]);
unset($_SESSION["messagefail5"]);
unset($_SESSION["messagefail4"]);
unset($_SESSION["messagefail3"]);
unset($_SESSION["messagefail1"]);
unset($_SESSION["messagefail2"]);
unset($_SESSION["messagesent"]);
unset($_SESSION["messagefail"]);

// If form submitted, insert values into the database.
$loginErr = $usernameErr = $emailErr= $successmsg1 ="" ;
if (empty($_POST['username'])){
	$_SESSION["messagefail4"] = "Please insert your selected username.";

                header("location: create_account.php"); 
  }

	if(empty($_POST['email'])){
		$_SESSION["messagefail3"] = "Please insert a valid email.";

                header("location: create_account.php");
     } 

		if(empty($_POST['dob']))
		{
			 $_SESSION["messagefail2"] = "Please enter your date of birth.";

                header("location: create_account.php");
		}

		if(empty($_POST['passw']))
		{
			 $_SESSION["messagefail5"] = "Please enter a password.";

                header("location: create_account.php");
		}

		if(empty($_POST['cpassw']))
		{
			 $_SESSION["messagefail6"] = "Please enter a repeat of the password entered above.";

                header("location: create_account.php");
		}


		$passw = $_POST['passw'];
		$cpassw = $_POST['cpassw'];

		if($passw == $cpassw){

  		$shapassword = hash( 'sha256', $passw );

		$username = $_POST['username'];
			    $qemail = $_POST['email'];
			     $dob = $_POST['dob'];

		if(empty($username) || empty($qemail) || empty($dob))
		{
			$_SESSION["messagefail1"] = "An empty field cannot be processed.";

                header("location: create_account.php");
		}
		else{
			$sql = "insert into users(username,dob,email,passw) values('$username','$dob','$qemail','$shapassword')";


			if ($conn->query($sql) === TRUE) {

			    $_SESSION["messagesent"] = "Account created successfully. A reply will be sent to your email";

			  	// $com = "node ./email/index.js ".$name." ".$email." ".$message."";
      //         	$output = shell_exec($com);


                header("location: create_account.php");  

			} else {
			   $_SESSION["messagefail"] = "Error creating your account. Try again later.";
			 	
                header("location: create_account.php");    
			}
		}
	}
	else
	{
		$_SESSION["messagefail7"] = "These passwords do not match.";
			 	
                header("location: create_account.php"); 
	}
 
?>
