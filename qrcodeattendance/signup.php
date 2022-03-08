<?php
include('config.php');
session_start();
error_reporting(0);
if(isset($_SESSION['email'])){
    header('Location: login.php');
}
if(isset($_POST['submit'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $phonenumber = $_POST['phonenumber'];
    $pass = md5($_POST['pass']);
    $conf_pass = md5($_POST['conf_pass']);

    if($pass == $conf_pass){
        $sql = "SELECT * FROM administrators WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);

        if(!$result ->num_rows > 0){
            $sql = "INSERT INTO administrators(fname, lname, email, role, phonenumber, pass)
                    VALUES('$fname', '$lname', '$email', '$role', '$phonenumber', '$pass')";
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

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Signup</title>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <style>
            body{
                background: rgb(2,0,36);
                background: linear-gradient(90deg,  rgba(255,0,0,0), green);
            }
            h2{
                margin-top: 5%;
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
        <section>
            <h2 class="text-center">QR Code Attendance System</h2>
            <h3 class="text-center h5">Signup</h3>
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

                    <div style="margin-bottom: 5px;">
                        <label for="role"><b>Role: <small style="color: tomato;">(Select one that apply)</small></b></label>
                        <input type="radio" name="role" value="Principal"> Principal
                        <input type="radio" name="role" value="Teacher"> Teacher
                    </div>
                    
                    <label for="number"><b>Phone Number</b></label>
                    <input type="text" placeholder="Enter Phone Number" name="phonenumber" required>
                
                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="pass" required>

                    <label for="psw"><b> ConfirmPassword</b></label>
                    <input type="password" placeholder="Confirm Password" name="conf_pass" required>
                
                    <button type="submit" name="submit">Signup</button>
                </div>

                <div class="container" style="background-color:#f1f1f1; height: 60px; padding-top: 9px;">
                    <span class="psw">Forgot <a href="reset.php">password?</a></span>
                    <p>Already have an account?<a href="login.php"> Login Here</a>.</p>
                </div>
            </form>
        </section>  
    </body>
</html>