<?php
    $server = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'qrattendance';
    
    $conn = mysqli_connect($server, $user, $password, $database );
    
    if(!$conn){
        die("<script>alert('Connection failed')</script>");
    }

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE FROM `administrators` WHERE id = $id";

        if($conn->query($sql) === TRUE){
            echo '<script>alert("Successfully Deleted")</script>';
        }else{
            echo "something went wrong";
        }
        
    }else{
        // redirect to show with error
        die('id not provided');
    }

?>

