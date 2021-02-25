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
	
?>
	
		<div class="row">
			<div class="col-md-2 container bg-warning sticky-top mt-5 mb-5" style="padding: 10px; margin-left: 20px; height: 550px; width: 200px;">
				<div class="dropdown" style="font-size: 20px;">
				  <span class="dropdown-item-text alert-primary">Dropdown Menu</span>
				  <a class="dropdown-item" href="admin_page.php">Home</a>
				  <a class="dropdown-item" href="list_of_students.php">List of Students</a>
				  <a class="dropdown-item" href="list_of_faculty.php">List of Faculty</a>
				  <a class="dropdown-item" href="remove_user.php">Remove User</a>
				  <a class="dropdown-item active" href="edit_user.php">Edit User</a>
				  <a class="dropdown-item" href="admin_notice.php">Notice Board</a>
				  <a class="dropdown-item" href="admin_upload_notice.php">Upload Notice</a>
				  <a class="dropdown-item" href="remove_notice.php">Remove Notice</a>
				  <a class="dropdown-item" href="edit_notice.php">Edit Notice</a>
				  <a class="dropdown-item" href="logout.php">Logout</a>
				</div>
			</div>

			<div class="container bg-info col-md-9 mt-5 mb-5 text-center" style="padding: 10px;">
				<br>
				<hr>
				<h1>Edit User</h1>
				<hr>
				<br><br>
				

					<div class="container bg-info mt-5 text-left" style="width: 600px;">
						<div class="card">
							<div class="card-body">
							    <p class="card-text">
							    	<br><br>
							    	<form action="edit_user.php" method="post">
						    		  <div>
									    <label for="status">User Category</label>
									    <select class="form-control" id="status" name="status">
									      <option>Select category</option>
									      <option value="studn">Student</option>
									      <option value="faclt">Faculty</option>
										</select>
									  </div>
									 <br>
									  <div class="form-group">
									    <label for="password">Enter Admin Password</label>
									    <input type="password" class="form-control" id="password" name="password">
									  </div>
									  
									  <div class="form-group text-center">
									  	<button type="submit" class="btn btn-primary" name="submit">Edit</button>
									  </div>
									</form>
								</p>
							</div>
						</div>
					</div>

				<center>
				<?php

					$link=mysqli_connect("localhost","root","") or die("MySql server couldn't connect!!!");
					mysqli_select_db($link,"csdp") or die("Database couldn't connect!!!");

					if(isset($_POST['submit']) && !empty($_POST['status']))
					{
						if($_POST['password']!=$_SESSION['password'])
						{
							echo "<div class='container alert alert-primary mt-5 text-center'";
							echo "<font color='red' size='5px'>";
							echo "!!!You entered incorrect password!!!";
							echo "</font></div>";
						}
						else
						{
							
							$status=$_POST['status'];
							
							if($status=="studn")
							{
								header("location:update_student.php");
								
							}
							else if($status=="faclt")
							{
								header("location:update_faculty.php");
							}
							
						}
					}

				?>
				</center>

			</div>
		</div>
		
	</div>

	<?php include_once("footer.php"); ?>

	
