<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	
	<title>Student Notice Board</title>
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
	$title=$_GET['title'];

	
?>
	
		<div class="row">
			<div class="col-md-2 container bg-warning sticky-top mt-5 mb-5" style="padding: 10px; margin-left: 20px; height: 550px; width: 200px;">
				<div class="dropdown" style="font-size: 20px;">
				  <span class="dropdown-item-text alert-primary">Dropdown Menu</span>
				  <a class="dropdown-item" href="student_page.php">Home</a>
				  <a class="dropdown-item" href="edit_academic.php">Edit Academic Achievements</a>
				  <a class="dropdown-item" href="edit_technical.php">Edit Technical Skills</a>
				  <a class="dropdown-item" href="faculty_for_student.php">List of Faculty</a>
				  <a class="dropdown-item active" href="student_notice.php">Notice Board</a>
				  <a class="dropdown-item" href="resume_builder.php">Resume Builder</a>
				  <a class="dropdown-item" href="ebooks.php">Ebooks</a>
				  <a class="dropdown-item" href="student_scrap.php">Scrap Space</a>
				  <a class="dropdown-item" href="logout.php">Logout</a>
				</div>
			</div>

			<div class="container bg-info col-md-9 mt-5 mb-5 text-center" style="padding: 10px;">
				<br>
				<hr>
				<h1>Student Notice Board</h1>
				<hr>
				<br><br>
				

					<div class="container bg-success mt-5 text-left" style="width: 800px;">
						<div class="card">
							<div class="card-body">
							    <p class="card-text text-center">
							    	<br><br>
							    	<center>
							    	<?php  
	
										$select="select * from noticemaster where title='$title'"; 
										$show=mysqli_query($link,$select) or die("The query couldn't execute!!!");
										$row=mysqli_fetch_array($show);
										echo "<table style='width: 600px;'>";
											echo "
												
												<tr>
													<h1>"."Notice"."</h1>
												</tr>
												<tr>
													<h2>".$title."</h2>
													
												</tr>
												<tr>
													<td align='left'><h6>".$row['date']."</h6></td>
												</tr>
												<tr>
													<td><p>".$row['content']."</p></td>
													
												</tr>";
											
										echo "</table>";

							    	?>
							    	</center>

								</p>
							</div>
						</div>
					</div>

			</div>
				
	<?php include_once("footer.php"); ?>

	
