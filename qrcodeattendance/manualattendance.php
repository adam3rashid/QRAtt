<?php session_start();
if(!isset($_SESSION['email'])){
    header("Location: login.php");
}
?>
<html>
    <head>
	  <meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <title>QR Code | Log in</title>
	  <!-- Tell the browser to be responsive to screen width -->
	  <meta name="viewport" content="width=device-width, initial-scale=1">

		<script type="text/javascript" src="js/instascan.min.js"></script>
		<!-- DataTables -->
		<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
		<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">

		<style>
			#divvideo{
				box-shadow: 0px 0px 1px 1px rgba(0, 0, 0, 0.1);
			}
		</style>
    </head>

    <body style="background:#eee">
		<div style="background-color: green; padding-top: 10px;padding-left: 12px; height: 60px;">
			<h5 style="font-weight: bold; color: white;">QR Code Attendance System<a href="logout.php" ><button style="float:right; margin-left: 3%;"  class="btn btn-info my-2 my-sm-0">Logout</button></a></h5>
		</div>
		
		<br/><br/>
       <div class="container">
            <div class="row">
                <div class="col-md-12">
					<div style="border-radius: 5px;padding:10px;background:#fff;" id="divvideo">
               			<p style="font-weight: bold;">Student List <i style="color: red;">(View More Details to mark attendance of respective student.)</i></p>
              
						<table id="example1" class="table table-bordered">
							<thead>
								<tr>
									<td>Student Name</td>
									<td>Admission Number</td>
									<td>Class</td>
									<td>View More Details</td>
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
								$sql ="SELECT * FROM students";
								$query = $conn->query($sql);
								while ($row = $query->fetch_assoc()){
								?>
								<tr>
									<td><?php echo $row['studentname'];?></td>
									<td><?php echo $row['admissionnumber'];?></td>
									<td><?php echo $row['classgroup'];?></td>
									<td><?php echo "<a class='btn btn-success' href='markpresentabsent.php?id=" .$row['admissionnumber'] ."'> View more Details</a>";?></td>
								</tr>
								<?php
								}
								?>
                    		</tbody>
                  		</table>
					</div>
				</div>
            </div>			
        </div>				
    </body>

	<script src="plugins/jquery/jquery.min.js"></script>
	<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
	<script src="plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
	<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
	<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

	<script>
		$(function () {
		$("#example1").DataTable({
			"responsive": true,
			"autoWidth": false,
		});
		$('#example2').DataTable({
			"paging": true,
			"lengthChange": false,
			"searching": false,
			"ordering": true,
			"info": true,
			"autoWidth": false,
			"responsive": true,
		});
		});
	</script>
</html>