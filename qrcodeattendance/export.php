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
$filename = 'AttenadanceRecord-'.date('Y-m-d').'.csv';

$query = "SELECT * FROM attendance";
$result = mysqli_query($conn,$query);

$array = array();

$file = fopen($filename,"w");
$array = array("Student Name","Admission Number","Time In ","Time Out","DATE");
fputcsv($file,$array);

while($row = mysqli_fetch_array($result)){
    $studentname =$row['studentname'];
    $admissionnumber =$row['admissionnumber'];
    $timein =$row['timein'];
    $timeout =$row['timeout'];
    $date =$row['date'];

    $array = array($studentname,$admissionnumber,$timein,$timeout,$date);
    fputcsv($file,$array);
}
fclose($file);

header("Content-Description: File Transfer");
header("Content-Disposition: Attachment; filename=$filename");
header("Content-type: application/csv;");
readfile($filename);
unlink($filename);
exit();

?>