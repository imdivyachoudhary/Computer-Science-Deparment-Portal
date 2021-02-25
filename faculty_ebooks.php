<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	
	<title>Ebooks</title>
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

	
?>
	
		<div class="row">
			<div class="col-md-2 container bg-warning sticky-top mt-5 mb-5" style="padding: 10px; margin-left: 20px; height: 550px; width: 200px;">
				<div class="dropdown" style="font-size: 20px;">
				  <span class="dropdown-item-text alert-primary">Dropdown Menu</span>
				  <a class="dropdown-item active" href="faculty_page.php">Home</a>
				  <a class="dropdown-item" href="student_batch.php">List of Students</a>
				  <a class="dropdown-item" href="faculty_notice.php">Notice Board</a>
				  <a class="dropdown-item" href="upload_notice.php">Upload Notice</a>
				  <a class="dropdown-item active" href="faculty_ebooks.php">Ebooks</a>
				  <a class="dropdown-item" href="upload_ebook.php">Upload Ebook</a>
				  <a class="dropdown-item" href="faculty_scrap.php">Scrap Space</a>
				  <a class="dropdown-item" href="logout.php">Logout</a>
				</div>
			</div>

			<div class="container bg-info col-md-9 mt-5 mb-5 text-center" style="padding: 10px;">
				<br>
				<hr>
				<h1>Ebooks</h1>
				<hr>
				<br><br>
				

					<div class="container bg-success mt-5 text-left" style="width: 600px;">
						<div class="card">
							<div class="card-body">
							    <p class="card-text text-left">
							    	<br><br>
							    	
							    	<?php  
	
										$handle=opendir("./ebooks") or die("Couldn't open the directory!!!");
										$i=1;
										while($value=readdir($handle))
										{
											if($value=="."||$value=="..")
											{
												continue;
											}
											else
											{
												echo "$i . <a href='./ebooks/$value'>$value</a>";
												echo "<br>";
												$i++;
											}

										} 
										closedir($handle);

							    	?>

									</p>
								</div>
							</div>
						</div>
							

			</div>
				
	<?php include_once("footer.php"); ?>

	
