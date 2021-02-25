<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	
	<title>Resume Builder</title>
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
				  <a class="dropdown-item" href="student_page.php">Home</a>
				  <a class="dropdown-item" href="edit_academic.php">Edit Academic Achievements</a>
				  <a class="dropdown-item" href="edit_technical.php">Edit Technical Skills</a>
				  <a class="dropdown-item" href="faculty_for_student.php">List of Faculty</a>
				  <a class="dropdown-item" href="student_notice.php">Notice Board</a>
				  <a class="dropdown-item  active" href="resume_builder.php">Resume Builder</a>
				  <a class="dropdown-item" href="ebooks.php">Ebooks</a>
				  <a class="dropdown-item" href="student_scrap.php">Scrap Space</a>
				  <a class="dropdown-item" href="logout.php">Logout</a>
				</div>
			</div>

			<div class="container bg-info col-md-9 mt-5 mb-5 text-center" style="padding: 10px;">
				<br>
				<hr>
				<h1>Resume of Student</h1>
				<hr>
				<br><br>
				

					<div class="container bg-success mt-5 text-left">
						<div class="card">
							<div class="card-body">
							    <p class="card-text text-center">
							    	<br><br>
							    	
							    	<h2>Enter details to create your resume:</h2>
									<br><br>
									<form action="created_resume.php" method="post" enctype="multipart/form-data">
										
											<div class="row">
												<div class="col-md-6">
													<table cellpadding="10px" >
													<tr>
														<td>Name</td>
														<td>:</td>
														<td><input type="text" name="name" placeholder="Enter your name"></td>
													</tr>
													<tr>
														<td>DOB</td>
														<td>:</td>
														<td><input type="date" name="dob" placeholder="Enter your dob"></td>
													</tr>
													<tr>
														<td>Photo</td>
														<td>:</td>
														<td><input type="file" name="photo" placeholder="Attach a passport size photo"></td>
													</tr>
													<tr>
														<td>Technical Expertise</td>
														<td>:</td>
														<td><textarea name="techexp" placeholder="Enter your technical expertise" rows="10" cols="50"></textarea></td>
													</tr>
													</table>
												</div>
												<div class="col-md-6">
													<table cellpadding="10px" >
													<tr>
														<td>Educational Qualifications</td>
														<td>:</td>
														<td><textarea name="edqual" placeholder="Enter your educational qualifications" rows="5" cols="50"></textarea></td>
													</tr>
													<tr>
														<td>Experience</td>
														<td>:</td>
														<td><textarea name="experience" placeholder="Enter experience(if any)" rows="10" cols="50"></textarea></td>
													</tr>
													</table>
												</div>
											</div>
											
											<table cellpadding="10px" >
											<tr>
												<td>Academic Records</td>
												<td>:</td>
											</tr>
											<tr>
												<td>
													<table>
														<tr>
															<td>Post-Graduation</td>
															<td>:</td>
															<td><input type="text" name="pgname" placeholder="Enter name of degree"></td>
															<td><input type="text" name="pgboard" placeholder="Enter name of Board/University"></td>
															<td><input type="number" name="pgyop" placeholder="Enter year os passing"></td>
															<td><input type="text" name="pgdivision" placeholder="Enter calss/division"></td>
															<td><input type="number" name="pgmarks" placeholder="Enter %marks"></td>
														</tr>
														<tr>
															<td>Graduation</td>
															<td>:</td>
															<td><input type="text" name="gname" placeholder="Enter name of degree"></td>
															<td><input type="text" name="gboard" placeholder="Enter name of Board/University"></td>
															<td><input type="number" name="gyop" placeholder="Enter year os passing"></td>
															<td><input type="text" name="gdivision" placeholder="Enter calss/division"></td>
															<td><input type="number" name="gmarks" placeholder="Enter %marks"></td>
														</tr>
														<tr>
															<td>Class XII</td>
															<td>:</td>
															<td><input type="text" name="c12name" placeholder="Enter name of degree"></td>
															<td><input type="text" name="c12board" placeholder="Enter name of Board/University"></td>
															<td><input type="number" name="c12yop" placeholder="Enter year os passing"></td>
															<td><input type="text" name="c12division" placeholder="Enter calss/division"></td>
															<td><input type="number" name="c12marks" placeholder="Enter %marks"></td>
														</tr>
														<tr>
															<td>Class X</td>
															<td>:</td>
															<td><input type="text" name="c10name" placeholder="Enter name of degree"></td>
															<td><input type="text" name="c10board" placeholder="Enter name of Board/University"></td>
															<td><input type="number" name="c10yop" placeholder="Enter year os passing"></td>
															<td><input type="text" name="c10division" placeholder="Enter calss/division"></td>
															<td><input type="number" name="c10marks" placeholder="Enter %marks"></td>
														</tr>
													</table>
												</td>
											</tr>
											
											
											<tr>
												<td colspan="3">
													<center><input type="submit" name="submit" value="Submit"></center>
												</td>
											</tr>
										</table>
									</form>

								</p>
							</div>
						</div>
					</div>
			</div>
				
	<?php include_once("footer.php"); ?>

	
