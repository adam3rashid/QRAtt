<?php
include('config.php');
session_start();
if(!isset($_SESSION['email'])){
    header("Location: login.php");
}

if(isset($_POST['submit'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    $pass = md5($_POST['pass']);
    $conf_pass = md5($_POST['conf_pass']);

    if($pass == $conf_pass){
        $sql = "SELECT * FROM administrators WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);

        if(!$result ->num_rows > 0){
            $sql = "INSERT INTO administrators(fname, lname, email, role, phonenumber, pass)
                    VALUES('$fname', '$lname', '$email', 'staff', '$phonenumber', '$pass')";
            $result = mysqli_query($conn, $sql);
            if($result){
                echo "<script>alert('Wow! User Registration Complete.')</script>";
                $fname = "";
                $lname = "";
                $email = "";
                $role = "";
                $phonenumber = "";
                $_POST['pass'] = "";
                $_POST['conf_pass'] = "";
            }else{
                echo "<script>alert('Whoops! Something went wrong, Please try again.')</script>";
            }
        }else{
            echo "<script>alert('Whoops! Email Already exists.')</script>";
        }
    }else{
        echo "<script>alert('Passwords not Matched.')</script>";
    }
}
?>

<!--This file is responsible for adding new users into the system-->
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
            footer {
                display: flex;
                justify-content: center;
                padding: 5px;
                background-color: green;
                color: #fff;
            }
            /* Styling Form */
            form {
            border: 3px solid #f1f1f1;
            width: 50%;
            margin: auto;
            }
            /* Add padding to containers */
            .container {
            padding: 16px;
            }
            /* Styling inputs */
            input[type=text], input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
            }
            .role{
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
            }
            /* Styling Image Container */
            .imgcontainer {
            text-align: center;
            margin: 24px 0 12px 0;
            }
            /* Styling Image */
            img.avatar {
            width: 40%;
            border-radius: 50%;
            }
            /* Styling button */
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
            /* The "Forgot password" text */
            span.psw {
            float: right;
            padding-top: 16px;
            }

            /* Change styles for span and cancel button on extra small screens */
            @media screen and (max-width: 300px) {
                span.psw {
                    display: block;
                    float: none;
                }
            }
        
        </style>
    </head>
    
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-success">
            <a class="navbar-brand" href="#"><h5>QR Code Attendance System</h5></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <a href="#"  style="text-decoration: none; color: white; margin-left: 7%; padding-top: 11px; padding-left: 600px;"> <?php echo "<p style='font-size: 15px;'>Welcome " .$_SESSION['email'] ."</p>"; ?></a>
                <a href="logout.php" ><button style=" padding: 5px; margin-left: 3%;"  class="btn btn-info my-2 my-sm-0">Logout</button></a>
            </div>
        </nav>
            
        <section>
            <h3 class="text-center h5" style="padding-top: 8px;">Add New User</h3>
            <form  action="" method="POST">
                <div class="imgcontainer">
                    <img src="images/avatar.png" alt="Avatar" class="avatar" style="width: 10%;">
                </div>
            
                <div class="container">
                    <label for="fname"><b>First Name</b></label>
                    <input type="text" placeholder="Enter First Name" name="fname" required>

                    <label for="lname"><b>Last Name</b></label>
                    <input type="text" placeholder="Enter Last Name" name="lname" required>

                    <label for="uname"><b>Email</b></label>
                    <input type="text" placeholder="Enter Email" name="email" required>
                    
                    <label for="number"><b>Phone Number</b></label>
                    <input type="text" placeholder="Enter Phone Number" name="phonenumber" required>
                
                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="pass" required>

                    <label for="psw"><b> ConfirmPassword</b></label>
                    <input type="password" placeholder="Confirm Password" name="conf_pass" required>
                
                    <button type="submit" name="submit">Add New User</button>
                </div>
            </form>
        </section>
        
        <footer>
            <p>© Adam Rashid </p>
        </footer>
    </body>
</html>