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

    if(isset($_POST['admissionnumber'])){
        
        $admissionnumber =$_POST['admissionnumber'];
		$date = date('Y-m-d');
		$time = date('h:i:s');

		$sql = "SELECT * FROM students WHERE admissionnumber = '$admissionnumber'";
		$query = $conn->query($sql);

		if($query->num_rows < 1){
			$_SESSION['error'] = 'Cannot find QRCode number '.$admissionnumber;
		}else{
				$row = $query->fetch_assoc();
				$id = $row['admissionnumber'];
				$studentname = $row['studentname'];
				$parentnumber = $row['parentnumber'];
				$message = "Dear Parent/Guardian, $studentname Admission Number: $id has arrived in school at $time";
				$message1 = "Dear Parent/Guardian, $studentname Admission Number: $id has left school at $time";
				$sql ="SELECT * FROM attendance WHERE admissionnumber='$id' AND date='$date'";
				$query=$conn->query($sql);
				if($query->num_rows>0){//changing  timeout to the respective time student gets out
				$sql = "UPDATE attendance SET timeout='$time'  WHERE admissionnumber='$admissionnumber' AND date='$date'";
				$query=$conn->query($sql);
				$_SESSION['success'] = 'Successfuly Time Out: '.$row['studentname'];
				$curl = curl_init();//Beginnning of code to send SMS
	curl_setopt_array($curl, array(
		CURLOPT_URL => "https://portal.zettatel.com/SMSApi/send",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => "userid=qrcode&password=Ej0y5fQd&&sendMethod=quick&mobile=".$parentnumber."&msg=".$message1."&senderid=ZTSMS&msgType=text&duplicatecheck=true&output=json",
		CURLOPT_HTTPHEADER => array(
			"apikey: 400dece1f139508b19e611caf3fa2bfb8e12bc4d",
			"cache-control: no-cache",
			"content-type: application/x-www-form-urlencoded"
		),
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
		echo "cURL Error #:" . $err;
	} else {
		echo $response;
	}//end
			}else{//recording attendance into db
					$sql = "INSERT INTO attendance(studentname, admissionnumber, timein, date) 
							VALUES('$studentname', '$admissionnumber', '$time','$date')";
					if($conn->query($sql) ===TRUE){
					 $_SESSION['success'] = 'Successfuly Time In: '.$row['studentname'];
						
						//beginning of code to send SMS
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => "https://portal.zettatel.com/SMSApi/send",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => "userid=qrcode&password=Ej0y5fQd&&sendMethod=quick&mobile=".$parentnumber."&msg=".$message."&senderid=ZTSMS&msgType=text&duplicatecheck=true&output=json",
		CURLOPT_HTTPHEADER => array(
			"apikey: 400dece1f139508b19e611caf3fa2bfb8e12bc4d",
			"cache-control: no-cache",
			"content-type: application/x-www-form-urlencoded"
		),
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
		echo "cURL Error #:" . $err;
	} else {
		echo $response;
	}//end


			 }else{
			  $_SESSION['error'] = $conn->error;
		   }	
		}
	}

	}else{
		$_SESSION['error'] = 'Please scan your QR Code number';
}
header("location: markattendance.php");
	   
$conn->close();
?>