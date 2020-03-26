<?php
        $_POST = json_decode(file_get_contents('php://input'), true);
        include("db.php");
      $sql2 = "SELECT username,video_comment,video_id FROM comments join users on comments.user_id = users.id WHERE video_id = '".$_POST["id"]."'";
    $result2 = $conn->query($sql2);
    if($result2->num_rows > 0){
        $ckes = array();
        while($row2 = $result2->fetch_assoc()){
            $conts = array(
            	'video_comment' => $row2["video_comment"],
                'username' => $row2["username"]
            );
            array_push($ckes, $conts);
        }
        $response = array(
            'status' => 'success',
            'message' => 'These are messages sent to us by voters',
            'data' => $ckes
        );
        header('Content-Type: application/json');
        echo json_encode($response);
    } else {
        $response = array(
            'status' => 'success',
            'message' => 'No results'
        );
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    
$conn->close();
 
?>
