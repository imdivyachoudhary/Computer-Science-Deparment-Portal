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
	$select="select * from studentacademicmaster where userid='$userid'"; 
	$show=mysqli_query($link,$select) or die("The query couldn't execute!!!");
	$row=mysqli_fetch_array($show);
	if(empty($row))
	{
		$select="insert into studentacademicmaster(userid) values('$userid')";
		$show=mysqli_query($link,$select) or die("The query couldn't execute!!!");
	}
	$acdachvmt=$row['acdachvmt'];
	$sports=$row['sports'];
	$cultural=$row['cultural'];
	$others=$row['others'];
	$graduation=$row['graduation'];
	$inter=$row['inter'];
	$highschool=$row['highschool'];

	
?>
	
		<div class="row">
			<div class="col-md-2 container bg-warning sticky-top mt-5 mb-5" style="padding: 10px; margin-left: 20px; height: 550px; width: 200px;">
				<div class="dropdown" style="font-size: 20px;">
				  <span class="dropdown-item-text alert-primary">Dropdown Menu</span>
				  <a class="dropdown-item" href="student_page.php">Home</a>
				  <a class="dropdown-item active" href="edit_academic.php">Edit Academic Achievements</a>
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
				<h1>Edit Academic Details</h1>
				<hr>
				<br><br>
				

				<div class="container bg-info mt-5 text-left" style="width: 600px;">

					<div class="card">
					 
					  <div class="card-body">
					    <h3 class="card-title text-center" style="color: green;">Enter the details to be updated</h3>

					    <p class="card-text">

					    	
					    	<br><br>
					    	<form action="edit_academic.php" method="post">

					    		<div class="row">
					    			 <div class="col-md-6">
					    				  <div class="form-group">
									        <label for="acdachvmt">Academic Achievements</label>
									        <?php  
									    		echo "<textarea class='form-control' id='acdachvmt' name='acdachvmt' rows='3' placeholder='$acdachvmt'></textarea>";
									    	?>
										  </div>

										  <div class="form-group">
										    <label for="sports">Sports</label>
										    <?php  
										    	echo "<textarea class='form-control' id='sports' name='sports' rows='3' placeholder='$sports'></textarea>";
										    ?>
										  </div>

										  <div class="form-group">
										    <label for="cultural">Cultural</label>
										    <?php  
										    	echo "<textarea class='form-control' id='cultural' name='cultural' rows='3' placeholder='$cultural'></textarea>";
										    ?>
										  </div>

										  
					    			</div>
					    			<div class="col-md-6">
					    				  <div class="form-group">
										    <label for="graduation">Graduation</label>
										    <?php  
										    	echo "<input type='number' class='form-control' id='graduation' name='graduation' placeholder='$graduation'>";
										    ?>
										  </div>

										  <div class="form-group">
										    <label for="inter">Inter</label>
										    <?php  
										    	echo "<input type='number' class='form-control' id='inter' name='inter' placeholder='$inter'>";
										    ?>
										  </div>

										  <div class="form-group">
										    <label for="highschool">High School</label>
										    <?php  
										    	echo "<input type='number' class='form-control' id='highschool' name='highschool' placeholder='$highschool'>";
										    ?>
										  </div>
										  <div class="form-group">
										    <label for="others">Others</label>
										    <?php  
										    	echo "<textarea class='form-control' id='others' name='others' rows='3' placeholder='$others'></textarea>";
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
			if(!empty($_POST['acdachvmt']))
			{
				$acdachvmt=$_POST['acdachvmt'];
				$update1="update studentacademicmaster set acdachvmt='$acdachvmt' where userid='$userid'";
				$u=mysqli_query($link,$update1) or die("The query 1 couldn't execute!!!");
				$flag=1;

			}
			if(!empty($_POST['sports']))
			{
				$sports=$_POST['sports'];
				$update2="update studentacademicmaster set sports='$sports' where userid='$userid'";
				$u=mysqli_query($link,$update2) or die("The query 2 couldn't execute!!!");
				$flag=1;

			}
			if(!empty($_POST['cultural']))
			{
				$cultural=$_POST['cultural'];
				$update3="update studentacademicmaster set cultural='$cultural' where userid='$userid'";
				$u=mysqli_query($link,$update3) or die("The query 3 couldn't execute!!!");
				$flag=1;

			}
			if(!empty($_POST['others']))
			{
				$others=$_POST['others'];
				$update4="update studentacademicmaster set others='$others' where userid='$userid'";
				$u=mysqli_query($link,$update4) or die("The query 4 couldn't execute!!!");
				$flag=1;

			}
			if(!empty($_POST['graduation']))
			{
				$graduation=$_POST['graduation'];
				$update5="update studentacademicmaster set graduation='$graduation' where userid='$userid'";
				$u=mysqli_query($link,$update5) or die("The query 5 couldn't execute!!!");
				$flag=1;
			}
			if(!empty($_POST['highschool']))
			{
				$highschool=$_POST['highschool'];
				$update6="update studentacademicmaster set highschool='$highschool' where userid='$userid'";
				$u=mysqli_query($link,$update6) or die("The query 6 couldn't execute!!!");
				$flag=1;
			}
			if(!empty($_POST['inter']))
			{
				$inter=$_POST['inter'];
				$update6="update studentacademicmaster set inter='$inter' where userid='$userid'";
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