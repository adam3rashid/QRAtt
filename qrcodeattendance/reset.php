<?php
include('config.php');
session_start();
error_reporting(0);

if(isset($_POST['submit'])) {
    $email = $_POST['email'];
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'mail/Exception.php';
require 'mail/PHPMailer.php';
require 'mail/SMTP.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'qrcodereset@gmail.com';                     // SMTP username
    $mail->Password   = '#Qwerty123';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('qrcodereset@gmail.com', 'Admin');
    $mail->addAddress($email);     // Add a recipient

    $code = substr(str_shuffle('1234567890QWERTYUIOPASDFGHJKLZXCVBNM'),0,10);

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Password Reset';
    $mail->Body    = 'To reset your password click <a href="http://localhost/qrcodeattendance/password.php?code='.$code.'">here </a>';

    $conn = new mySqli('localhost', 'root', '', 'qrattendance');

    if($conn->connect_error) {
        die('Could not connect to the database.');
    }

    $verifyQuery = $conn->query("SELECT * FROM administrators WHERE email = '$email'");

    if($verifyQuery->num_rows) {
        $codeQuery = $conn->query("UPDATE administrators SET code = '$code' WHERE email = '$email'");
            
        $mail->send();
        echo '<script>alert("Message has been sent, check your email")</script>';
    }else{
        echo '<script>alert("Kindly use a valid email")</script>';
    }
    

} catch (Exception $e) {
    echo '<script>alert("Message could not be sent. Enter a Valid Email)</script>';
}    

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Reset Form</title>

        <!--Bootstrap Link-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
        <style>
            body{
                width: 100%;
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
            width: 55%;
            margin: auto;
            }
            /* Styling Container */
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
                transition: .3s;
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
            /* Add a hover effect for button */
            button:hover {
            opacity: 0.8;
            }
        </style>
    </head>
    
    <body>
        <section>
            <form  method="POSt" action="" style="margin-top: 3%;">
                <h4 class="text-center" style="margin-top: 5%; margin-bottom: 2%;">Reset Password</h4>
                <div class="container">
                    <div class="input-group">
                        <input type="email" name="email" placeholder="Enter Email to change your password" value="<?php echo $email;?>" required>
                    </div>

                    <div class="input-group">
                        <button name="submit" type="submit">Reset Password</button>
                    </div>

                    <p class="login-register-text" style="padding-top: 7px;">Kindly enter a valid registered email, a reset password link will be sent to the email address.</p>
                    <p class="login-register-text">Check your spam folder if not in your inbox.</p>
                </div>
                
                <div style="background-color:#f1f1f1; padding: 7px; height: 45px;">
                    <p class="login-register-text" style="padding-left: 12px;">Remembered your Password? <a href="login.php">Login Here</a>.</p>
                </div>   
            </form>
        </section>    
    </body>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>


