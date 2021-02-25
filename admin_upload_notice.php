<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	
	<title>Upload Notice</title>
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
				  <a class="dropdown-item" href="admin_notice.php">Notice Board</a>
				  <a class="dropdown-item active" href="admin_upload_notice.php">Upload Notice</a>
				  <a class="dropdown-item" href="logout.php">Logout</a>
				</div>
			</div>

			<div class="container bg-info col-md-9 mt-5 mb-5 text-center" style="padding: 10px;">
				<br>
				<hr>
				<h1>Upload Notice</h1>
				<hr>
				<br><br>
				

					<div class="container mt-5 text-left" style="width: 800px;">

						<div class="card">
						 
						  <div class="card-body">
						    <h3 class="card-title text-center" style="color: green;">Enter the details of the notice</h3>

						    <p class="card-text">

						    	
						    	<br><br>
						    	<form action="upload_notice.php" method="post">
					    		  
					    		  <div class="form-group">
								    <label for="title">Title of Notice</label>
								    <input type="text" class="form-control" id="title" name="title">
								  </div>
								  
								  <div class="form-group">
								    <label for="type">Type</label>
								    <select class="form-control" id="type" name="type">
								      <option></option>
								      <option value="student">Student</option>
								      <option value="faculty">Faculty</option>
								      <option value="general">General</option>
								    </select>
								  </div>

								  <div>
								    <label for="content">Content</label>
								    <textarea class="form-control" id="content" name="content" rows="10"></textarea>
								  </div>
								  <br>
								  <br>
								  <div class="form-group text-center">
								  	<button type="submit" class="btn btn-primary" name="submit">Upload</button>
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
		
		$link=mysqli_connect("localhost","root","") or die("MySql server couldn't connect!!!");
		mysqli_select_db($link,"csdp") or die("Database couldn't connect!!!");

		$userid=$_SESSION['userid'];
		$title=$_POST['title'];
		$content=$_POST['content'];
		$type=$_POST['type'];
		$datenow=date("y-m-d");
		$insert="insert into noticemaster values('$userid','$title','$content','$type','$datenow','NULL')";
		$query=mysqli_query($link, $insert) or die("The query couldn't execute!!!");


		if(mysqli_affected_rows($link)>0)
		{
			echo "<font color='green' size='5px'>-- Notice has been uploaded successfully --</font>";
		}
		else
		{
			echo "<font color='red' size='8px'>!!!Notice not uploaded!!!</font>";
		}

	}
		
		
?>
			</div>
		</div>

<?php include_once("footer.php"); ?>