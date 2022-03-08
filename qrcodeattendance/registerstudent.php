<?php
include('config.php');
session_start();
if(!isset($_SESSION['email'])){
    header("Location: login.php");
}

if(isset($_POST['submit'])){
	$studentname = $_POST['studentname'];
	$admissionnumber = $_POST['admissionnumber'];
	$classgroup = $_POST['classgroup'];
	$age = $_POST['age'];
	$gender = $_POST['gender'];
    $parentname = $_POST['parentname'];
    $parentnumber = $_POST['parentnumber'];

	//code for image uploading
	if($_FILES['f1']['name']){
		move_uploaded_file($_FILES['f1']['tmp_name'], "image/".$_FILES['f1']['name']);
		$img="image/".$_FILES['f1']['name'];
	}
 
	$i="insert into students(studentname, admissionnumber, classgroup, age, gender, parentname, parentnumber, image)
        values('$studentname', '$admissionnumber', '$classgroup', '$age', '$gender', '$parentname', '$parentnumber', '$img')";
		if(mysqli_query($conn, $i)){
		    echo "<script>alert('inserted successfully..!')</script>";
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
            <div class="container" style="border: 1.5px solid rgb(172, 172, 172); margin-top: 1.5%; padding-left: 50px; padding-top: 10px; width: 40%;  margin-bottom: 15%;">
                <h5 class="text-center" style="font-weight: 700;margin-top: 2%;">Student Enrollment Details</h5>
                <center><i class="fa fa-address-card" aria-hidden="true" style="color: green; font-size: 380%; margin-top: 1%;"></i></center>
                <img id="output" style="width: 20%;"><br>
                <h6 style="margin-top: 3%;">Select a Photo to upload</h6>
   
                <form method="POST" action="#" enctype="multipart/form-data">
                    <dl>
                        <p>
                            <input type="file" name="f1" class="form-control" autocomplete="off"  accept="image/*" onchange="loadFile(event)" required style="width: 90%; ">
                        </p>
                    </dl>
    
                    <label for="uname"><b>Student Name : </b></label>
                    <input type="text"  class="form-control" style="width: 90%;"  name="studentname" required> 

                    <label for="uname" style="margin-top: 2%;"><b>Admission Number : </b></label>
                    <input type="number"  class="form-control" name="admissionnumber" style="width: 90%;" required>
        
                    <label for="uname" style="margin-top: 2%;"><b>Class : </b></label>
                    <select name="classgroup"  class="form-control" style="width: 90%;">
                        <option value="form1">Form 1</option>
                        <option value="form2">Form 2</option>
                        <option value="form3">Form 3</option>
                        <option value="form4">Form 4</option>
                    </select> 

                    <label for="uname" style="margin-top: 2%;"><b>Age : </b></label>
                    <input type="text"  class="form-control" name="age" style="width: 90%;" required> 

                    <label for="uname" style="margin-top: 2%;"><b>Gender : </b></label>
                    <select name="gender"  class="form-control"  style="width: 90%;" >
                        <option value="female">Female</option>
                        <option value="male">Male</option>
                    </select> 

                    <label for="uname" style="margin-top: 2%;"><b>Parent Name : </b></label>
                    <input type="text"  class="form-control"  name="parentname" style="width: 90%;" required> 

                    <label for="uname" style="margin-top: 2%;"><b>Parent Phone no : </b></label>
                    <input type="text"  class="form-control" style="width: 90%;" name="parentnumber" required>
                    <p style="color: grey; font-style: italic;"> (This will be used in sending SMS)</p>  

                    <p>
                        <input type="submit"  name="submit" style="margin-top: 1%;" value="Enroll" class="btn btn-info">
                    </p>
                </form>
                <?php
                    include "library/qrlib.php";
                    $PNG_TEMP_DIR = 'image/';
                    if (!file_exists($PNG_TEMP_DIR))
                        mkdir($PNG_TEMP_DIR);

                    $filename = $PNG_TEMP_DIR . 'test.png';
                    
                    if (isset($_POST["submit"])) {

                        //$codeString = $img . "\n";
                        //$codeString = $_POST['studentname'] . "\n";
                        $codeString = $_POST['admissionnumber'] . "\n";
                        // $codeString .= $_POST['classgroup'] . "\n";
                        // $codeString .= $_POST['parentname'] . "\n";
                        // $codeString .= $_POST['parentnumber'];
                        $studentname = $_POST['studentname'];

                    $filename = $PNG_TEMP_DIR . $studentname . '.png';

                    QRcode::png($codeString, $filename);

                    echo '<img src="' . $PNG_TEMP_DIR . basename($filename) . '" /><button class="btn bg-success" id="qrcode"><a href="print.php"><i class="fa fa-print"></i> Print</a></button>';        
                }

                ?>
            </div>
        </section>
        
        <footer>
            <p>© Adam Rashid </p>
        </footer>
    </body>
<script>
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
    };

    
</script>

</html>