<?php
session_start();
$server = "localhost";
$username="root";
$password="";
$dbname="qrattendance";

$conn = new mysqli($server,$username,$password,$dbname);

if($conn->connect_error){
    die("Connection failed" .$conn->connect_error);
}


if(isset($_POST['submit'])){
    $admissionnumber = $_REQUEST['admissionnumber'];
    $num = $admissionnumber;
    $sql = "Select * FROM students WHERE admissionnumber = $num";
    $query = $conn->query($sql);

    $row = $query->fetch_assoc();
    $id = $row['admissionnumber'];
    $studentname = $row['studentname'];
    $classgroup = $row['classgroup'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container" id="student_id" style="border: 1px solid green; width: 500px; margin-top: 2%; border-radius: 10px;">
    <h2 class="text-center" style="color: green; font-size: 30px;">QR Code Attendance</h2><hr>
        <div class="row">
            <div class="col">
                <p style="font-weight: bold;">Student's Name: <?php echo $row['studentname'];?></p>
                <p style="font-weight: bold;">Admission Number: <?php echo $row['admissionnumber'];?></p>
                <p style="font-weight: bold;">Class: <?php echo $row['classgroup'];?></p>
                <p style="font-weight: bold;">Validity: One Year after date of issue</p>
            </div>
            <div class="col-md-auto">
                <?php
                $imgdir = $row['image'];
                echo "<img src='$imgdir' width='100px;' height='140px;'>"; 
                ?>
            </div>
        </div>
    </div>

    <div class="container" style="border: 1px solid green; width: 500px; margin-top: 2%; border-radius: 10px;">
    <h2 class="text-center" style="color: green; font-size: 30px;">QR Code Attendance</h2><hr>
        <div class="row">
            <div class="col">
                <address style="padding-top: 3%;">
                    Visit Us: Near Makadara Grounds<br>
                    Email: qrcodereset@gmail.com<br>
                    P.O.Box 81738 - 80100<br>
                    Makadara, Mombasa<br>
                    Kenya
                </address>
            </div>
            <div class="col-md-auto">
                <img src="image/Adam Ahmed Rashid.png" alt="" width="100px" height="150px" style="padding-top: 20%; padding-bottom: 20%;"> 
            </div>
        </div>
    </div>

    <center>
    <div style="margin-top: 3%;">
        <button class="btn" style="background-color: green; width: 100px; color: white; border-radius: 20px;" onclick=window.print()>Print</button>
    </div>
    </center>

</body>
</html>


