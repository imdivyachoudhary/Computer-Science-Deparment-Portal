<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	
	<title>List of Faculty</title>
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
				  <a class="dropdown-item active" href="list_of_faculty.php">List of Faculty</a>
				  <a class="dropdown-item" href="admin_notice.php">Notice Board</a>
				  <a class="dropdown-item" href="admin_upload_notice.php">Upload Notice</a>
				  <a class="dropdown-item" href="logout.php">Logout</a>
				</div>
			</div>

			<div class="container bg-info col-md-9 mt-5 mb-5 text-center" style="padding: 10px;">
				<br>
				<hr>
				<h1>List of Faculty</h1>
				<hr>
				<br><br>
				<center>
				<?php

					$link=mysqli_connect("localhost","root","") or die("MySql server couldn't connect!!!");
					mysqli_select_db($link,"csdp") or die("Database couldn't connect!!!");

					// $select="select * from studentpersonalmaster";
					$select="select * from facultypersonalmaster join facultymaster where facultymaster.userid=facultypersonalmaster.userid"; 
					$show=mysqli_query($link,$select) or die("The query couldn't execute!!!");
					echo "<table border='1px' cellpadding='10px' cellspacing='0px' class='bg-light'>";
						echo "
							<tr>
								<th>Name</th>
								<th>Degree</th>
								<th>Department</th>
								<th>Joining Year</th>
								<th>Dob</th>
								<th>Gender</th>
								<th>Mob No.</th>
								<th>Userid</th>
								<th>Edit</th>
								<th>Remove</th>
								
							</tr>
							";
						while($row=mysqli_fetch_array($show))
						{
							$user=$row['userid'];
							echo "
								<tr>
									<td>".$row['name']."</td>
									<td>".$row['degree']."</td>
									<td>".$row['department']."</td>
									<td>".$row['joiningyear']."</td>
									<td>".$row['dob']."</td>
									<td>".$row['gender']."</td>
									<td>".$row['mobnumber']."</td>
									<td>".$row['userid']."</td>
									<td><a href='update_faculty.php?userid=$user'> Edit </a></td>
									<td><a href='remove_user.php?userid=$user'> Remove </a></td>
								</tr>
								";
						}
					echo "</table>";

				?>
				</center>

			</div>
		</div>
		
	</div>

	<?php include_once("footer.php"); ?>

	
