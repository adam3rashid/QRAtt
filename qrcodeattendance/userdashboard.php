<?php
session_start();
if(!isset($_SESSION['email'])){
    header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>QR Code Attendance System</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <style>
            .navbar-nav > li{
            padding-left: 35px;
            padding-right: 35px;
            }
            footer {
                display: flex;
                justify-content: center;
                padding: 5px;
                background-color: green;
                color: #fff;
            }
        </style>
    </head>
    
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-success">
            <a class="navbar-brand" href="#"><h5>QR Code Attendance System</h5></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
                
            <a href="#" style="text-decoration: none; color: white; margin-left: 0%; padding-top: 11px; padding-left: 600px;"> <?php echo "<p style='font-size: 15px;'>Welcome " .$_SESSION['email'] ."</p>"; ?></a>
            <a href="logout.php" ><button style=" padding: 5px; margin-left: 3%;"  class="btn btn-info my-2 my-sm-0">Logout</button></a>
            </div>
        </nav>

        <br/><br/>
        <div style="height: 450px; width: 750px; margin: auto; padding-left: 50px;" >
            <div class="row">
                <div class="col" style="width: 200px; height: 150px; padding-top: 50px; margin-right: 20px; background-color: green; margin-bottom: 20px;" >
                    <center><i class="fa fa-graduation-cap" style="font-weight: bold; color: white;"></i></center>
                    <center><a href="students.php" style=" font-weight: bold; color: white;">Students</a></center>
                </div>
                <div class="col" style="width: 200px; height: 150px; padding-top: 50px; margin-right: 20px; background-color: green;">
                    <center><i class="fa fa-camera" style="font-weight: bold; color: white;"></i></center>
                    <center><a href="markattendance.php" style="font-weight: bold; color: white;">Mark Attendance</a></center>
                </div>
            </div>

            <div class="row">
                <div class="col" style="width: 200px; height: 150px; padding-top: 50px; margin-right: 20px; background-color: green;">
                    <center><i class="fa fa-book" style="font-weight: bold; color: white;"></i></center>    
                    <center><a href="manualattendance.php" style="font-weight: bold; color: white;">Manual Attendance</a></center>
                </div>
                
                <div class="col" style="width: 200px; height: 150px; padding-top: 50px; margin-right: 20px; background-color: green;">
                    <center><i class="fa fa-file-excel" style="font-weight: bold; color: white;"></i></center>    
                    <center><a href="report.php" style="padding-left: 15px; font-weight: bold; color: white;">Attendance Report</a></center>
                </div>
            </div>
        </div>
    </body>

    <footer>
        <p>© Adam Rashid </p>
    </footer>
</html>