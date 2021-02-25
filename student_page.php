<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	
	<title>Student Page</title>
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
	$userid=$_SESSION['userid'];
	$link=mysqli_connect("localhost","root","") or die("MySql server couldn't connect!!!");
	mysqli_select_db($link,"csdp") or die("Database couldn't connect!!!");

	
?>
	
		<div class="row">
			<div class="col-md-2 container bg-warning sticky-top mt-5 mb-5" style="padding: 10px; margin-left: 20px; height: 550px; width: 200px;">
				<div class="dropdown" style="font-size: 20px;">
				  <span class="dropdown-item-text alert-primary">Dropdown Menu</span>
				  <a class="dropdown-item active" href="student_page.php">Home</a>
				  <a class="dropdown-item" href="edit_academic.php">Edit Academic Achievements</a>
				  <a class="dropdown-item" href="edit_technical.php">Edit Technical Skills</a>
				  <a class="dropdown-item" href="faculty_for_student.php">List of Faculty</a>
				  <a class="dropdown-item" href="student_notice.php">Notice Board</a>
				  <a class="dropdown-item" href="resume_builder.php">Resume Builder</a>
				  <a class="dropdown-item" href="ebooks.php">Ebooks</a>
				  <a class="dropdown-item" href="student_scrap.php">Scrap Space</a>
				  <a class="dropdown-item" href="logout.php">Logout</a>
				</div>
			</div>

			<div class="container bg-info col-md-9 mt-5 mb-5 text-center" style="padding: 10px;">
				<br>
				<hr>
				<h1>Welcome To The Student Page</h1>
				<hr>
				<br><br>
				

					<div class="container bg-success mt-5 text-left" style="width: 800px;">
						<div class="card">
							<div class="card-body">
							    <p class="card-text text-center">
							    	<br><br>
							    	
							    	<?php  
	
										$select="select * from studentpersonalmaster join studentmaster where studentmaster.userid=studentpersonalmaster.userid and studentmaster.userid='$userid'"; 
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
													<th>Roll No.</th>
													<td>:</td>
													<td>".$row['rollno']."</td>
												</tr>
												<tr>
													<th>Degree</th>
													<td>:</td>
													<td>".$row['degree']."</td>
												</tr>
												<tr>
													<th>Branch</th>
													<td>:</td>
													<td>".$row['branch']."</td>
												</tr>
												<tr>
													<th>Joining Year</th>
													<td>:</td>
													<td>".$row['joiningyear']."</td>
												</tr>
												<tr>
													<th>Batch</th>
													<td>:</td>
													<td>".$row['batch']."</td>
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
													<th>Address</th>
													<td>:</td>
													<td>".$row['address']."</td>
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




					<br>
					<br>
					<br>
					<hr>
					<h1>Academic Achievements</h1>
					<hr>
					<br>
					

						<div class="container bg-success mt-5 text-left" style="width: 800px;">
							<div class="card">
								<div class="card-body">
								    <p class="card-text text-center">
								    	<br><br>
								    	
								    	<?php  
		
											$select="select * from studentacademicmaster where userid='$userid'"; 
											$show=mysqli_query($link,$select) or die("The query couldn't execute!!!");
											$row=mysqli_fetch_array($show);
											if(!empty($row))
											{
											echo "<table cellpadding='10px' cellspacing='0px'>";
												echo "
													
													<tr>
														<th>Academic Achievements</th>
														<td>:</td>
														<td>".$row['acdachvmt']."</td>
													</tr>
													<tr>
														<th>Sports</th>
														<td>:</td>
														<td>".$row['sports']."</td>
													</tr>
													<tr>
														<th>Cultural</th>
														<td>:</td>
														<td>".$row['cultural']."</td>
													</tr>
													<tr>
														<th>Others/th>
														<td>:</td>
														<td>".$row['others']."</td>
													</tr>
													<tr>
														<th>Graduation</th>
														<td>:</td>
														<td>".$row['graduation']."</td>
													</tr>
													<tr>
														<th>Inter</th>
														<td>:</td>
														<td>".$row['inter']."</td>
													</tr>
													<tr>
														<th>High School</th>
														<td>:</td>
														<td>".$row['highschool']."</td>
													</tr>
													";
												echo "</table>";
												}
												else
												{
													echo "No Academic achievements added yet";
												}

								    	?>

									</p>
								</div>
							</div>
						</div>



					<br>
					<br>
					<br>
					<hr>
					<h1>Technical Skills</h1>
					<hr>
					<br>
					

						<div class="container bg-success mt-5 text-left" style="width: 800px;">
							<div class="card">
								<div class="card-body">
								    <p class="card-text text-center">
								    	<br><br>
								    	
								    	<?php  
		
											$select="select * from studenttechnicalmaster where userid='$userid'"; 
											$show=mysqli_query($link,$select) or die("The query couldn't execute!!!");
											$row=mysqli_fetch_array($show);
											if(!empty($row))
											{
											echo "<table cellpadding='10px' cellspacing='0px'>";
												echo "
													
													<tr>
														<th>Programming Languages</th>
														<td>:</td>
														<td>".$row['prgmlanguage']."</td>
													</tr>
													<tr>
														<th>Database</th>
														<td>:</td>
														<td>".$row['databasedb']."</td>
													</tr>
													<tr>
														<th>OS</th>
														<td>:</td>
														<td>".$row['os']."</td>
													</tr>
													<tr>
														<th>Softwares/th>
														<td>:</td>
														<td>".$row['software']."</td>
													</tr>
													<tr>
														<th>Other Skills</th>
														<td>:</td>
														<td>".$row['otherskill']."</td>
													</tr>
													<tr>
														<th>Industry Exp</th>
														<td>:</td>
														<td>".$row['industryexp']."</td>
													</tr>
													<tr>
														<th>Academic Projects</th>
														<td>:</td>
														<td>".$row['academicproject']."</td>
													</tr>
													";
												echo "</table>";
												}
												else
												{
													echo "No Technical skills added yet";
												}

								    	?>

									</p>
								</div>
							</div>
						</div>
							

			</div>
				
	<?php include_once("footer.php"); ?>

	
