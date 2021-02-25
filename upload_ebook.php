<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	
	<title>Upload Ebook</title>
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
					    	<form action="upload_ebook.php" method="post" enctype="multipart/form-data">
				    		  
				    		  
							  
							  <div class="form-group">
							    <label for="ebook">Select the ebook you want to upload</label>
							    <input type="file" class="form-control" id="ebook" name="ebook">
							  </div>

							  <div class="form-group text-center">
							  	<button type="submit" class="btn btn-primary" name="submit">Upload</button>
							  </div>
							</form>
					    	
					    </p>
					    
					  </div>
					  
					</div>
				</div>
				
				<br><br>
				<center>
				<?php

					if(isset($_POST['submit']))
					{
					$src = $_FILES['ebook']['tmp_name'];
					$des = $_SERVER['DOCUMENT_ROOT']."/csdp/ebooks/".$_FILES['ebook']['name'];
					if(move_uploaded_file($src, $des))
					{
						echo "<font color='green'>Ebook has been uploaded successfully</font>";
					}
					else
					{
						echo "<font color='red'>Ebook couldn't be uploaded!!!</font>";
					}
					}
					
					
				?>
				</center>

			</div>
		</div>
	

		
	<?php include_once("footer.php"); ?>

	
