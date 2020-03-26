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