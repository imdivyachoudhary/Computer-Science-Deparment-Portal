<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	
	<title>List of Students</title>
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
				  <a class="dropdown-item active" href="faculty_page.php">Home</a>
				  <a class="dropdown-item" href="student_batch.php">List of Students</a>
				  <a class="dropdown-item" href="faculty_notice.php">Notice Board</a>
				  <a class="dropdown-item" href="upload_notice.php">Upload Notice</a>
				  <a class="dropdown-item" href="faculty_ebooks.php">Ebooks</a>
				  <a class="dropdown-item" href="upload_ebook.php">Upload Ebook</a>
				  <a class="dropdown-item" href="faculty_scrap.php">Scrap Space</a>
				  <a class="dropdown-item" href="logout.php">Logout</a>
				</div>
			</div>



			<div class="container bg-info col-md-9 mt-5 mb-5 text-center" style="padding: 10px;">
				<div class="container mt-5 text-left" style="width: 800px;">

					<div class="card">
					 
					  <div class="card-body">

					    <p class="card-text">
					    	
					    	<br><br>
					    	<form action="student_batch.php" method="post">
				    		  
				    		  
							  
							  <div class="form-group">
							    <label for="batch">Enter the batch</label>
							    <input type="number" class="form-control" id="batch" name="batch">
							      
							  </div>

							  <div class="form-group text-center">
							  	<button type="submit" class="btn btn-primary" name="submit">Display</button>
							  </div>
							</form>
					    	
					    </p>
					    
					  </div>
					  
					</div>
				</div>
				<br>
				<hr>
				<h1>List of Students</h1>
				<hr>
				<br><br>
				<center>
				<?php

					
					$link=mysqli_connect("localhost","root","") or die("MySql server couldn't connect!!!");
					mysqli_select_db($link,"csdp") or die("Database couldn't connect!!!");

					// $select="select * from studentpersonalmaster";
					if(isset($_POST['submit']))
					{
					$batch=$_POST['batch'];
					$select="select * from studentpersonalmaster join studentmaster where studentmaster.userid=studentpersonalmaster.userid and studentmaster.batch='$batch'"; 
					$show=mysqli_query($link,$select) or die("The query couldn't execute!!!");
					echo "<table border='1px' cellpadding='10px' cellspacing='0px'>";
						echo "
							<tr>
								<th>Roll No.</th>
								<th>Name</th>
								<th>Degree</th>
								<th>Branch</th>
								<th>Joining Year</th>
								<th>Batch</th>
								<th>Dob</th>
								<th>Gender</th>
								<th>Address</th>
								<th>Mob No.</th>
								<th>Userid</th>
								
							</tr>
							";
						while($row=mysqli_fetch_array($show))
						{
							echo "
								<tr>
									<td>".$row['rollno']."</td>
									<td>".$row['name']."</td>
									<td>".$row['degree']."</td>
									<td>".$row['branch']."</td>
									<td>".$row['joiningyear']."</td>
									<td>".$row['batch']."</td>
									<td>".$row['dob']."</td>
									<td>".$row['gender']."</td>
									<td>".$row['address']."</td>
									<td>".$row['mobnumber']."</td>
									<td>".$row['userid']."</td>
								</tr>
								";
						}
					echo "</table>";
					}

				?>
				</center>

			</div>
		</div>
		
	</div>

	<?php include_once("footer.php"); ?>

	
