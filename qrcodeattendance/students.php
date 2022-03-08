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
      <title>School Biometrics</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

      <style>
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
      <a class="navbar-brand" href="#"><h5>School Biometrics System</h5></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <a href="#" style="text-decoration: none; color: white; margin-left: 7%; padding-top: 11px; padding-left: 600px;"> <?php echo "<p style='font-size: 15px;'>Welcome " .$_SESSION['email'] ."</p>"; ?></a>
        <a href="logout.php" ><button style=" padding: 5px; margin-left: 3%;"  class="btn btn-info my-2 my-sm-0">Logout</button></a>
      </div>
    </nav>

    <center>      
      <div style="margin-bottom: 50%;border: 1.5px solid rgb(172, 172, 172); width: 40%; margin-top: 3%; padding-bottom: 3%;">
        <center>
          <br>
          <h4 style=" margin-top:1% ;"> <i class="fa fa-users" aria-hidden="true" style="color: green; font-size: 100%; margin-top: 1%; "></i> Classes</h4>
          <a href="students/class_single.php"><button class="btn btn-sm" style="padding-top: 3%; padding-left: 10%; padding-right: 10%; padding-bottom: 3%; margin-top:3% ;font-weight: 700; color: white; background-color: green">Form 1</button></a> <br>
          <a href="students/class_single1.php"> <button class="btn btn-sm"  style="padding-top: 3%; padding-left: 10%; padding-right: 10%; padding-bottom: 3%; margin-top:1% ;font-weight: 700; color: white; background-color: green">Form 2 </button></a> <br>
          <a href="students/class_single2.php"> <button class="btn btn-sm"  style="padding-top: 3%; padding-left: 10%; padding-right: 10%; padding-bottom: 3%; margin-top:1% ;font-weight: 700; color: white; background-color: green">Form 3 </button></a> <br>
          <a href="students/class_single3.php"> <button class="btn btn-sm"  style="padding-top: 3%; padding-left: 10%; padding-right: 10%; padding-bottom: 3%; margin-top:1% ;font-weight: 700; color: white; background-color: green">Form 4 </button></a>
        </center>
      </div>
    </center>
      
    <footer>
      <p>© Adam Rashid</p>
    </footer>
  </body>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>