<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	
	<title>Edit User</title>
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
	if(!isset($_GET['userid']))
	{
		header("location:list_of_faculty.php");
	}

	$userid=$_GET['userid'];
	$_SESSION['edit']=$userid;
	
	$link=mysqli_connect("localhost","root","") or die("MySql server couldn't connect!!!");
	mysqli_select_db($link,"csdp") or die("Database couldn't connect!!!");

	$select="select * from facultymaster join facultypersonalmaster where facultymaster.userid=facultypersonalmaster.userid and facultymaster.userid='$userid'";
	$show=mysqli_query($link,$select) or die("The query couldn't execute!!!");
	$row=mysqli_fetch_array($show);
	$name=$row['name'];
	$dob=$row['dob'];
	$gender=$row['gender'];
	$degree=$row['degree'];
	$department=$row['department'];
	$joiningyear=$row['joiningyear'];
	$mobnum=$row['mobnumber'];


?>
	
		<div class="row">
			<div class="col-md-2 container bg-warning sticky-top mt-5 mb-5" style="padding: 10px; margin-left: 20px; height: 550px; width: 200px;">
				<div class="dropdown" style="font-size: 20px;">
				  <span class="dropdown-item-text alert-primary">Dropdown Menu</span>
				  <a class="dropdown-item" href="admin_page.php">Home</a>
				  <a class="dropdown-item" href="list_of_students.php">List of Students</a>
				  <a class="dropdown-item active" href="list_of_faculty.php">List of Faculty</a>
				  <a class="dropdown-item" href="admin_notice.php">Notice Board</a>
				  <a class="dropdown-item" href="admin_upload_notice.php">Upload Notice</a>
				  <a class="dropdown-item" href="logout.php">Logout</a>
				</div>
			</div>

			<div class="container bg-info col-md-9 mt-5 mb-5 text-center" style="padding: 10px;">
				<br>
				<hr>
				<h1>Edit Faculty User</h1>
				<hr>
				<br><br>
				

					<div class="container bg-info mt-5 text-left" style="width: 800px;">

						<div class="card">
						 
						  <div class="card-body">
						    <h3 class="card-title text-center" style="color: green;">Enter the details to be updated</h3>

						    <p class="card-text">

						    	
						    	<br><br>
						    	<div>
								    <label for="email">Userid of the user whose info is to be updated</label><br>
								    <?php  
								    	echo "<b>$userid</b>";
								    ?>

								</div>
								<br>
						    	<form action="update_faculty1.php" method="post">

						    	<div class="row">
						    		<div class="col-md-6">
						    			  <div class="form-group">
										    <label for="name">Name</label>
										    <?php  
										    	echo "<input type='text' class='form-control' id='name' name='name' placeholder='$name'>";
										    ?>
										  </div>
										  
										  <div class="form-group">
										    <label for="dob">DOB</label>
										    <?php  
										    	echo "<input type='text' class='form-control' id='dob' name='dob' placeholder='$dob'>";
										    ?>
										  </div>
										  <div class="form-group">
										    <label for="gender">Gender</label>
										    <select class="form-control" id="gender" name="gender">
										      <option><?php echo "$gender"; ?></option>
										      <option value="Male">Male</option>
										      <option value="Female">Female</option>
										      <option value="Other">Other</option>
										    </select>
										  </div>
										  <div class="form-group">
										    <label for="degree">Degree</label>
										    <?php  
										    	echo "<input type='text' class='form-control' id='degree' name='degree' placeholder='$degree'>";
										    ?>
										  </div>
						    		</div>
						    		<div class="col-md-6">
						    			  
										  <div class="form-group">
										    <label for="department">Department</label>
										    <select class="form-control" id="department" name="department">
										      <option><?php echo "$department";  ?></option>
										      <option value="C.S.E.">C.S.E.</option>
										      <option value="I.T.">I.T.</option>
											</select>
										  </div>
										  <div class="form-group">
										    <label for="joiningyear">Joining year</label>
										    <?php  
										    	echo "<input type='number' class='form-control' id='joiningyear' name='joiningyear' placeholder='$joiningyear'>";
										    ?>
										  </div>
										  
										  <div class="form-group">
										    <label for="mobnum">Mobile Number</label>
										    <?php  
										    	echo "<input type='text' class='form-control' id='mobnum' name='mobnum' placeholder='$mobnum'>";
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
			</div>
		</div>

<?php include_once("footer.php"); ?>