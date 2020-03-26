<?php
    session_start();
        $_POST = json_decode(file_get_contents('php://input'), true);
        include("db.php");
            $user_id = $_SESSION["user_id"];
                    $sql3 = "INSERT INTO comments (video_comment, video_id, user_id) VALUES('".$_POST["video_comment"]."', '".$_POST["id"]."',$user_id)";

                    if($conn->query($sql3) === TRUE){
                        $response = array(
                            'status' => 'success',
                            'message' => 'Your public comment has been succefully sent.'
                        );
                        header('Content-Type: application/json');
                        echo json_encode($response);
                    } else {
                        $response = array(
                            'status' => 'error',
                            'message' => 'Error sending your comment.'
                        );
                        header('Content-Type: application/json');
                        echo json_encode($response);
                    }
                
$conn->close();
?>