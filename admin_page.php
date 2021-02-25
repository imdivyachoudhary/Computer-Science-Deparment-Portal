<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	
	<title>Admin Page</title>
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
				<h1>Welcome To The Admin Page</h1>
				<hr>
				<br><br>
				<div class="container mt-5 bg-light" style="width: 800px;">
				<p class="text-justify" style="font-size: 20px;">
					University of Lucknow was established in 1921 and will be completing one hundred years in 2021.
					It is the oldest university of Uttar Pradesh. Faculty of Engineering and Technology is one among 8 faculties offering B.Tech. in five disciplines and B.C.A. and M.C.A.
				</p>

				<p class="text-justify" style="font-size: 20px;">
					It is an online web portal for Computer Science Department, so that everyone can get information about
					department, students can easily communicate with teachers from anywhere. Teachers can easily communicate with students, and can keep records of every student easily and efficiently. This portal can be accessed from any corner of the world on net.
				</p>

				<p class="text-justify" style="font-size: 20px;">
					We hope our students can communicate with the faculty in a smooth way and come out with flying colors. We wish them great success in all their endeavors and quest for a better tomorrow, for themselves and for the mankind.
				</p>
				<br><br><br>
				</div>
				<br><br><br>
			</div>
		</div>
		

	<?php include_once("footer.php"); ?>

	<!-- <script src="js/popper.min.js" ></script>
    <script src="js/bootstrap.min.js" ></script>
 -->