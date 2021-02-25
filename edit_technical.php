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
	$select="select * from studenttechnicalmaster where userid='$userid'"; 
	$show=mysqli_query($link,$select) or die("The query couldn't execute!!!");
	$row=mysqli_fetch_array($show);
	if(empty($row))
	{
		$select="insert into studenttechnicalmaster(userid) values('$userid')";
		$show=mysqli_query($link,$select) or die("The query couldn't execute!!!");
	}
	$prgmlanguage=$row['prgmlanguage'];
	$databasedb=$row['databasedb'];
	$os=$row['os'];
	$software=$row['software'];
	$otherskill=$row['otherskill'];
	$industryexp=$row['industryexp'];
	$academicproject=$row['academicproject'];
	
?>
	
		<div class="row">
			<div class="col-md-2 container bg-warning sticky-top mt-5 mb-5" style="padding: 10px; margin-left: 20px; height: 550px; width: 200px;">
				<div class="dropdown" style="font-size: 20px;">
				  <span class="dropdown-item-text alert-primary">Dropdown Menu</span>
				  <a class="dropdown-item" href="student_page.php">Home</a>
				  <a class="dropdown-item" href="edit_academic.php">Edit Academic Achievements</a>
				  <a class="dropdown-item active" href="edit_technical.php">Edit Technical Skills</a>
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
				<h1>Edit Technical Details</h1>
				<hr>
				<br><br>
				

				<div class="container bg-info mt-5 text-left" style="width: 600px;">

					<div class="card">
					 
					  <div class="card-body">
					    <h3 class="card-title text-center" style="color: green;">Enter the details to be updated</h3>

					    <p class="card-text">

					    	
					    	<br><br>
					    	<form action="edit_technical.php" method="post">

					    		<div class="row">
					    			<div class="col-md-6">
					    				  <div class="form-group">
										    <label for="prgmlanguage">Programming Languages</label>
										    <?php  
										    	echo "<textarea class='form-control' id='prgmlanguage' name='prgmlanguage' rows='3' placeholder='$prgmlanguage'></textarea>";
										    ?>
										  </div>

										  <div class="form-group">
										    <label for="databasedb">Database</label>
										    <?php  
										    	echo "<textarea class='form-control' id='databasedb' name='databasedb' rows='3' placeholder='$databasedb'></textarea>";
										    ?>
										  </div>

										  <div class="form-group">
										    <label for="os">OS</label>
										    <?php  
										    	echo "<textarea class='form-control' id='os' name='os' rows='3' placeholder='$os'></textarea>";
										    ?>
										  </div>

										  
					    			</div>
					    			<div class="col-md-6">
					    				  <div class="form-group">
										    <label for="software">Softwares</label>
										    <?php  
										    	echo "<textarea class='form-control' id='software' name='software' rows='3' placeholder='$software'></textarea>";
										    ?>
										  </div>
					    				  <div class="form-group">
										    <label for="otherskill">Other Skills</label>
										    <?php  
										    	echo "<input type='number' class='form-control' id='otherskill' name='otherskill' placeholder='$otherskill'>";
										    ?>
										  </div>

										  <div class="form-group">
										    <label for="industryexp">Industry Exp</label>
										    <?php  
										    	echo "<input type='number' class='form-control' id='industryexp' name='industryexp' placeholder='$industryexp'>";
										    ?>
										  </div>

										  <div class="form-group">
										    <label for="academicproject">Academic Projects</label>
										    <?php  
										    	echo "<input type='number' class='form-control' id='academicproject' name='academicproject' placeholder='$academicproject'>";
										    ?>
										  </div>
					    			</div>
					    		</div>
				    		 
				    		  
							  
							  

							  <div class="form-group text-center">
							  	<button type="submit" class="btn btn-primary" name="submit">Update</button>
							  	<button type="reset" class="btn btn-primary" name="reset">Reset</button>
							  </div>
							  
							</form>
					    	
					    </p>
					    
					  </div>
					</div>
				</div>
			
		
<?php  
	echo "<center>";
	

		if(isset($_POST['submit']))
		{
			$flag=0;
			if(!empty($_POST['prgmlanguage']))
			{
				$prgmlanguage=$_POST['prgmlanguage'];
				$update1="update studenttechnicalmaster set prgmlanguage='$prgmlanguage' where userid='$userid'";
				$u=mysqli_query($link,$update1) or die("The query 1 couldn't execute!!!");
				$flag=1;

			}
			if(!empty($_POST['databasedb']))
			{
				$databasedb=$_POST['databasedb'];
				$update2="update studenttechnicalmaster set databasedb='$databasedb' where userid='$userid'";
				$u=mysqli_query($link,$update2) or die("The query 2 couldn't execute!!!");
				$flag=1;

			}
			if(!empty($_POST['os']))
			{
				$os=$_POST['os'];
				$update3="update studenttechnicalmaster set os='$os' where userid='$userid'";
				$u=mysqli_query($link,$update3) or die("The query 3 couldn't execute!!!");
				$flag=1;

			}
			if(!empty($_POST['software']))
			{
				$software=$_POST['software'];
				$update4="update studenttechnicalmaster set software='$software' where userid='$userid'";
				$u=mysqli_query($link,$update4) or die("The query 4 couldn't execute!!!");
				$flag=1;

			}
			if(!empty($_POST['otherskill']))
			{
				$otherskill=$_POST['otherskill'];
				$update5="update studenttechnicalmaster set otherskill='$otherskill' where userid='$userid'";
				$u=mysqli_query($link,$update5) or die("The query 5 couldn't execute!!!");
				$flag=1;
			}
			if(!empty($_POST['industryexp']))
			{
				$industryexp=$_POST['industryexp'];
				$update6="update studenttechnicalmaster set industryexp='$industryexp' where userid='$userid'";
				$u=mysqli_query($link,$update6) or die("The query 6 couldn't execute!!!");
				$flag=1;
			}
			if(!empty($_POST['academicproject']))
			{
				$academicproject=$_POST['academicproject'];
				$update6="update studenttechnicalmaster set academicproject='$academicproject' where userid='$userid'";
				$u=mysqli_query($link,$update6) or die("The query 6 couldn't execute!!!");
				$flag=1;
			}
			
			if($flag==1)
			{
				echo "<div class='container alert alert-primary mt-5 text-center'";
				echo "<font color='green' size='5px'>";
				echo "Updated user $userid successfully";
				echo "</font></div>";
			}

			else
			{
				echo "<div class='container alert alert-primary mt-5 text-center'";
				echo "<font color='red' size='5px'>";
				echo "Updation of user $userid failed";
				echo "</font></div>";
			}
		}
	echo "</center>";
	
?>
				</div>
			</div>

	<?php include_once("footer.php"); ?>