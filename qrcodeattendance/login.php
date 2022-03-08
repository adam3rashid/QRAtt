<?php
include('config.php');
session_start();
error_reporting(0);
if(isset($_SESSION['email'])){
    header('Location: dashboard.php');
}
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $pass = md5($_POST['pass']);
    $sql = "SELECT * FROM administrators WHERE email = '$email' AND pass = '$pass'";
    $result = mysqli_query($conn, $sql);

    if($result->num_rows > 0){
        $row = mysqli_fetch_assoc($result);
        $_SESSION['email'] = $row['email'];
        $who = $row['role'];
         
        if($who == 'staff'){
            header('Location: userdashboard.php');
        }else{
            header('Location: dashboard.php');
        }
    }else{
        echo "<script>alert('Whoops! Email or Password is wrong')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>QR Code Attendance System</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <style>
            body{
                background: rgb(2,0,36);
                background: linear-gradient(90deg,  rgba(255,0,0,0), green);
            }
            /* Styling form */
            form {
            border: 3px solid #f1f1f1;
            width: 35%;
            margin: auto;
            }
            /* Styling Container*/
            .container {
            padding: 16px;
            }
            /* Styling Uer inputs */
            input[type=text], input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
            }

            /* Styling Button */
            button {
            background-color: #04AA6D;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            }
            button:hover {
            opacity: 0.8;
            }
            /* Styling Image */
            .imgcontainer {
            text-align: center;
            margin: 24px 0 12px 0;
            }

            /* Avatar image */
            img.avatar {
            width: 40%;
            border-radius: 50%;
            }
        </style>
    </head>

    <body>
        <section>
            <form  method="POSt" action="" style="margin-top: 3%;">
                <h4 class="text-center" style="margin-top: 3%; margin-bottom: 2%;">QR Code Attendance System</h4>
                <div class="imgcontainer">
                    <img src="images/avatar.jpg" alt="Avatar" class="avatar" style="width: 20%;">
                </div>
                
                <div class="container">
                    <label for="uname"><b>Email</b></label>
                    <input type="text" class="form-control"  placeholder="Enter Email" name="email" required>
                
                    <label for="psw"><b>Password</b></label>
                    <input type="password" class="form-control" placeholder="Enter Password" name="pass" required>
                
                    <button type="submit" name="submit">Login</button>
                    
                </div>

                <div style="background-color:#f1f1f1; padding: 5px; height: 60px;">
                    <p class="login-register-text" style=" padding-left: 8px;">Don't have an Account? <a href="signup.php">Register Here</a>.
                    <br/>Forgot Password?<a href="reset.php"> Reset here</a>.</p>
                </div>
                </form>
        </section>
    </body>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script> 

</html>