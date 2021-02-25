<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<title>About Us</title>
</head>
<body class="bg-dark">

	<?php include_once("header.php"); ?>

	<div class="container-fluid sticky-top" style="background-color: pink; font-size: 30px; padding: 10px;">
		<ul class="nav nav-pills">
		  <li class="nav-item">
		    <a class="nav-link" href="login.php">Home</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link active" href="about.php">About Us</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" href="student_registration_form.php">Student Registration</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" href="faculty_registration_form.php">Faculty Registration</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" href="contact.php">Contact Us</a>
		  </li>
		  <div style="margin-left: 200px;">
			<span style="color: green;">Email:</span> foetlu@gmail.com
		  </div>
		</ul>
	</div>

	<div class="container bg-info mt-5">
		<div class="row">
			<div class="col-md-4 text-center" style="padding: 10px;">
				<img src="images/foet.png" height="400px;" width="100%">
			</div>
			<div class="col-md-8">
				<h4 style="color: red;">Our Profile !!!</h4>

				<p class="text-justify">
					University of Lucknow was established in 1921 and will be completing one hundred years in 2021.
					It is the oldest university of Uttar Pradesh. Faculty of Engineering and Technology is one among 8 faculties offering B.Tech. in five disciplines and B.C.A. and M.C.A.
				</p>

				<p class="text-justify">
					It is an online web portal for Computer Science Department, so that everyone can get information about
					department, students can easily communicate with teachers from anywhere. Teachers can easily communicate with students, and can keep records of every student easily and efficiently. This portal can be accessed from any corner of the world on net.
				</p>

				<p class="text-justify">
					We hope our students can communicate with the faculty in a smooth way and come out with flying colors. We wish them great success in all their endeavors and quest for a better tomorrow, for themselves and for the mankind.
				</p>

				<p class="text-justify">We are confident that our students will gain good benefits from our portal.</p>

				<p class="text-justify">We wish them every success in their studies and their career.</p>
			</div>
		</div>
	</div>

</body>
</html>

<?php 

	include_once("footer.php");

?>