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
        $sql = "DELETE FROM `students` WHERE admissionnumber = $id";//Delete respective student from table student
        $del = "DELETE FROM `attendance` WHERE admissionnumber = $id";//Delete deleted student's attendance

        if($conn->query($sql) === TRUE){
            if($conn->query($del) === TRUE){
                echo '<script>alert("Successfully Deleted")</script>';
            }
        }else{
            echo "something went wrong";
        }
        
    }else{
        // redirect to show with error
        die('id not provided');
    }

?>

