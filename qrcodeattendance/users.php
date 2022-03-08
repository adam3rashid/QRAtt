<?php
session_start();
if(!isset($_SESSION['email'])){
    header("Location: login.php");
}
if(isset($_POST['view'])){

  echo '<script>alert("view")</script>';
}
if(isset($_POST['delete'])){
  echo '<script>alert("deleted")</script>';
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
      <a class="navbar-brand" href="#"><h5>QR Code Attendance System</h5></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
          
      <a href="#" style="text-decoration: none; color: white; margin-left: 7%; padding-top: 11px; padding-left: 600px;"> <?php echo "<p style='font-size: 15px;'>Welcome " .$_SESSION['email'] ."</p>"; ?></a>
      <a href="logout.php" ><button style=" padding: 5px; margin-left: 3%;"  class="btn btn-info my-2 my-sm-0">Logout</button></a>
    </nav>

    <div>
    <center>
      <a href="add_new_user.php"><span class="fa fa-plus">Add New User</span></a>
      <table class="table" style="width: 75%; margin-top: 3%; margin-bottom: 32%; float: center;">
        <thead>
          <tr>
            <th>First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        
        <tbody>
          <?php
          $server = "localhost";
          $username="root";
          $password="";
          $dbname="qrattendance";
                  
          $conn = new mysqli($server,$username,$password,$dbname);
          $date = date('Y-m-d');
          if($conn->connect_error){
              die("Connection failed" .$conn->connect_error);
          }
              $sql ="SELECT * FROM administrators";
              $query = $conn->query($sql);
              while ($row = $query->fetch_assoc()){
          ?>
          <tr>
            <td><?php echo $row['fname'];?></td>
            <td><?php echo $row['lname'];?></td>
            <td><?php echo $row['email'];?></td>
            <td><?php echo $row['role'];?></td>
            <td><?php echo $row['phonenumber'];?></td>
            <td><?php echo "<a class='btn btn-danger' href='delete.php?id=" .$row['id'] ."'> Delete</a>";?></td>
          </tr>
          
          <?php
          }
          ?>
        </tbody>
      </table>
    </center>
    </div>
    <footer>
      <p>© Adam Rashid </p>
    </footer>
  </body>

  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>