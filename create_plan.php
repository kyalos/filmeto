<?php

session_start();

if(!isset($_SESSION["loggedin"]))
{
	 $_SESSION['please_login'] = "Please Login to create a plan!!";
    $_SESSION['current_url'] = "http://localhost/filmeto/pricing.php";
    header("location: login.php"); 
}
else{

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "filmeto";
$sql = "";
$sql2 = "";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

 $package=$_POST['package'];
 $ccn=$_POST['card_number'];
 $amount=$_POST['amount'];
 $passw=$_POST['passw'];

 $username = $_SESSION["username"];


 $query = "SELECT * FROM users WHERE username='$username' LIMIT 1";
     
    //echo $_POST['password'];
$shapassword = hash( 'sha256', $passw );




 $result = mysqli_query($conn,$query) or die(mysql_error());
 $rows = mysqli_num_rows($result);
 $row = mysqli_fetch_assoc($result);

 		$user_id = $row['id'];

 		if($package == "daily")
 		{
 			$d = strtotime("tomorrow");
			$dd = date("Y-m-d h:i:sa", $d);
			if($amount > 40)
			{
	            $_SESSION['excees_amount'] = "The amount is alot for a daily package."; 
	            header("location: pricing.php");
			}
 		}
 		else if($package == "monthly")
 		{
 			$d = strtotime("+30 days");
			$dd = date("Y-m-d h:i:sa", $d);

			if($amount > 900)
			{
	            $_SESSION['excees_amount'] = "The amount is alot for a monthly package."; 
	            header("location: pricing.php");
			}
 		}
 		else if($package == "yearly")
 		{
 			$d = strtotime("+12 Months");
			$dd = date("Y-m-d h:i:sa", $d);

			if($amount > 8500)
			{
	            $_SESSION['excees_amount'] = "The amount is alot for a yearly package."; 
	            header("location: pricing.php");
			}
 		}


        if($rows==1){
             if ($shapassword == $row['passw']) {

      			$sql = "INSERT INTO pricing (package,ccn,upto,amount,user_id)
					VALUES ('$package','$ccn','$dd','$amount','$user_id')";

					if ($conn->query($sql) === TRUE) {
					    
					    $_SESSION['plan_created'] = $package.'  package plan has been created. Expiry on '.$dd;
					    unset($_SESSION['wrongpass']);
					    header("location: pricing.php"); 
					 


					} else {
					    // echo "Error: " . $sql . "<br>" . $conn->error;
					    $_SESSION['plan_failed'] = 'Failed to create plan';
					    unset($_SESSION['plan_created']);
					    header("location: pricing.php"); 

					}

        	}
	        else
	        {	           
	            $_SESSION['wrongpass'] = "Invalid credentials"; 
	            header("location: pricing.php");    
	         }
     	}
	         else
	         {
	            $_SESSION['wrongpass'] = "Invalid credentials";  
	            header("location: pricing.php");   
	        }


mysqli_close($conn);
}

?>
