<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	
	<title>Remove User</title>
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
		header("location:admin_page.php");
	}
	
	$userid=$_GET['userid'];
	$_SESSION['remove']=$userid;
	
	
?>
	
		<div class="row">
			<div class="col-md-2 container bg-warning sticky-top mt-5 mb-5" style="padding: 10px; margin-left: 20px; height: 550px; width: 200px;">
				<div class="dropdown" style="font-size: 20px;">
				  <span class="dropdown-item-text alert-primary">Dropdown Menu</span>
				  <a class="dropdown-item active" href="admin_page.php">Home</a>
				  <a class="dropdown-item" href="list_of_students.php">List of Students</a>
				  <a class="dropdown-item" href="list_of_faculty.php">List of Faculty</a>
				  <a class="dropdown-item" href="admin_notice.php">Notice Board</a>
				  <a class="dropdown-item" href="admin_upload_notice.php">Upload Notice</a>
				  <a class="dropdown-item" href="logout.php">Logout</a>
				</div>
			</div>

			<div class="container bg-info col-md-9 mt-5 mb-5 text-center" style="padding: 10px;">
				<br>
				<hr>
				<h1>Remove User</h1>
				<hr>
				<br><br>
				

					<div class="container bg-info mt-5 text-left" style="width: 600px;">
						<div class="card">
							<div class="card-body">
							    <p class="card-text">
							    	<br><br>
							    	
						    		  <div>
									    <label for="email">This userid will be removed</label>
									    <br>
									    <?php  
									    	echo "<b>$userid</b>";
									    ?>
									  </div>
									  <br>

									<form action="remove_user1.php" method="post">
									  <div class="form-
									    <label for="password">Enter Admin Password to remove the user</label>
									    <input type="password" class="form-control" id="password" name="password">
									  </div>
									  
									  <div class="form-group text-center">
									  	<button type="submit" class="btn btn-primary" name="submit">Delete</button>
									  </div>
									</form>
								</p>
							</div>
						</div>
					</div>
			</div>
		</div>
		
	</div>

	<?php include_once("footer.php"); ?>

	
