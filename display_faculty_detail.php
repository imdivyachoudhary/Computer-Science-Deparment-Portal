<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	
	<title>Faculty Details</title>
</head>
<body class="bg-dark">

	<?php include_once("header.php"); ?>

</body>
</html>

<?php  

	session_start();
	if(!isset($_SESSION['userid']))
	{
		header("location:login.php");
	}
	$userid=$_GET['userid'];
	
?>
	
		<div class="row">
			<div class="col-md-2 container bg-warning sticky-top mt-5 mb-5" style="padding: 10px; margin-left: 20px; height: 550px; width: 200px;">
				<div class="dropdown" style="font-size: 20px;">
				  <span class="dropdown-item-text alert-primary">Dropdown Menu</span>
				  <a class="dropdown-item" href="student_page.php">Home</a>
				  <a class="dropdown-item" href="edit_academic.php">Edit Academic Achievements</a>
				  <a class="dropdown-item" href="edit_technical.php">Edit Technical Skills</a>
				  <a class="dropdown-item active" href="faculty_for_student.php">List of Faculty</a>
				  <a class="dropdown-item" href="student_notice.php">Notice Board</a>
				  <a class="dropdown-item" href="resume_builder.php">Resume Builder</a>
				  <a class="dropdown-item" href="ebooks.php">Ebooks</a>
				  <a class="dropdown-item" href="student_scrap.php">Scrap Space</a>
				  <a class="dropdown-item" href="logout.php">Logout</a>
				</div>
			</div>

			<div class="container bg-info col-md-9 mt-5 mb-5 text-center" style="padding: 10px; height: 2000px;">
				<br>
				<hr>
				<h1>Faculty Profile</h1>
				<hr>
				<br><br>
				

					<div class="container bg-success mt-5 text-left" style="width: 400px;">
						<div class="card">
							<div class="card-body">
							    <p class="card-text text-center">
							    	<br><br>
							    	
							    	<?php  

							    		$link=mysqli_connect("localhost","root","") or die("MySql server couldn't connect!!!");
										mysqli_select_db($link,"csdp") or die("Database couldn't connect!!!");

										$select="select * from facultypersonalmaster join facultymaster where facultymaster.userid=facultypersonalmaster.userid and facultymaster.userid='$userid'"; 
										$show=mysqli_query($link,$select) or die("The query couldn't execute!!!");
										$row=mysqli_fetch_array($show);
										echo "<table cellpadding='10px' cellspacing='0px'>";
											echo "
												
												<tr>
													<th>Name</th>
													<td>:</td>
													<td>".$row['name']."</td>
												</tr>
												<tr>
													<th>Userid</th>
													<td>:</td>
													<td>".$row['userid']."</td>
												</tr>
												<tr>
													<th>Degree</th>
													<td>:</td>
													<td>".$row['degree']."</td>
												</tr>
												<tr>
													<th>Department</th>
													<td>:</td>
													<td>".$row['department']."</td>
												</tr>
												<tr>
													<th>Joining Year</th>
													<td>:</td>
													<td>".$row['joiningyear']."</td>
												</tr>
												<tr>
													<th>Dob</th>
													<td>:</td>
													<td>".$row['dob']."</td>
												</tr>
												<tr>
													<th>Gender</th>
													<td>:</td>
													<td>".$row['gender']."</td>
												</tr>
												<tr>
													<th>Mob No.</th>
													<td>:</td>
													<td>".$row['mobnumber']."</td>
												</tr>
												
												";
											echo "</table>";

							    	?>

								</p>
							</div>
						</div>
					</div>
			</div>
				
	<?php include_once("footer.php"); ?>

	
