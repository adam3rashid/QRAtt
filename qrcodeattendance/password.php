<?php
if(isset($_GET['code'])) {
    $code = $_GET['code'];

    $conn = new mySqli('localhost', 'root', '', 'qrattendance');
    if($conn->connect_error) {
        die('Could not connect to the database');
    }

    $verifyQuery = $conn->query("SELECT * FROM administrators WHERE code = '$code' ");

    if($verifyQuery->num_rows == 0) {
        header("Location: index.php");
        exit();
    }

    if(isset($_POST['submit'])) {
        $newpassword = md5($_POST['newpassword']);
        $confirm_pass = md5($_POST['confirm_pass']);
        if($newpassword == $confirm_pass){
            $changeQuery = $conn->query("UPDATE administrators SET pass = '$newpassword' WHERE  code = '$code'");
            if($changeQuery) {
                echo '<script>alert("Password changed successfully")</script>';
            }
        }else{
            echo '<script>alert("Passwords do not match")</script>';
        }  
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Reset Password</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!--Bootstrap Link-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
        <style>
            body{
                min-height: 100vh;
                display: flex;
                justify-content: center;
                align-items: center;
                background: rgb(2,0,36);
                background: linear-gradient(90deg,  rgba(255,0,0,0), green);
            }
            /* Styling form */
            form {
                border: 3px solid #f1f1f1;
                width: 125%;
                margin: auto;
            }
            /* Styling container*/
            .container {
                padding: 16px;
            }
            .container .input-group{
                width: 100%;
                height: 50px;
                margin-bottom: 10px;
            }
            .container .input-group input{
                width: 100%;
                height: 100%;
                border: 2px solid #e7e7e7;
                padding: 15px 20px;
                font-size: 1rem;
                background: transparent;
                outline: none;
            }
            /* Styling button*/
            button {
            background-color: #04AA6D;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            }
            /* Add a hover effect for buttons */
            button:hover {
            opacity: 0.8;
            }    
        </style>
    </head>

    <body>
        <section>
            <form  method="POSt" action="" style="margin-top: 3%;">
                <h4 class="text-center" style="margin-top: 3%; margin-bottom: 2%;">Reset Password</h4>
                <div class="container">
                    <div class="input-group">
                        <input type="password" name="newpassword" placeholder="New Password"  required>
                    </div>

                    <div class="input-group">
                        <input type="password" name="confirm_pass" placeholder="Confirm New Password"  required>
                    </div>

                    <div class="input-group">
                        <button name="submit" type="submit">Reset</button>
                    </div>            
                </div>
                
                <div style="background-color:#f1f1f1; padding: 5px; height: 58px;">
                    <p style="padding-left: 9px; padding-top:10px;">Go back to Login page <a href="login.php"><i class="fa fa-arrow-right "></i></a></p>
                </div>
            </form>
        </section>
    </body>
</html>


