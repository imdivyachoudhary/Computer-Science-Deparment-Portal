<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<title>Faculty Registration Form</title>
</head>
<body class="bg-dark">

	<?php include_once("header.php"); ?>

	<div class="container-fluid sticky-top" style="background-color: pink; font-size: 30px; padding: 10px;">
		<ul class="nav nav-pills">
		  <li class="nav-item">
		    <a class="nav-link" href="login.php">Home</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" href="about.php">About Us</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" href="student_registration_form.php">Student Registration</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link active" href="faculty_registration_form.php">Faculty Registration</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" href="contact.php">Contact Us</a>
		  </li>
		  <div style="margin-left: 200px;">
			<span style="color: green;">Email:</span> foetlu@gmail.com
		  </div>
		</ul>
	</div>

	<div class="container bg-info mt-5" style="width: 800px;">


		<div class="card">
		  <div class="card-header text-center">
		    Create your profile
		  </div>
		  <div class="card-body">
		    <h3 class="card-title text-center" style="color: green;">Faculty Registration Form</h3>

		    <p class="card-text">

		    	<h5 class="text-center">*All the entries are compulsory*</h5>
		    	<br><br>
		    	<form action="faculty_registration_form.php" method="post">	  
			  
				  <div class="row">
				 	<div class="col-md-6">
	    		  		  <div class="form-group">
						    <label for="name">Name</label>
						    <input type="text" class="form-control" id="name" name="name">
						  </div>
						  <div class="form-group">
						    <label for="email">Email address</label>
						    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
						  </div>
						  <div class="form-group">
						    <label for="dob">DOB</label>
						    <input type="date" class="form-control" id="dob" name="dob">
						  </div>
						  <div class="form-group">
						    <label for="gender">Gender</label>
						    <select class="form-control" id="gender" name="gender">
						      <option>Select your gender</option>
						      <option value="Male">Male</option>
						      <option value="Female">Female</option>
						      <option value="Other">Other</option>
						    </select>
						  </div>
						  <div class="form-group">
						    <label for="password">Create Password</label>
						    <input type="password" class="form-control" id="password" name="password">
						  </div>
	    		  	</div>
	    		  	<div class="col-md-6">
	    		  		  <div class="form-group">
						    <label for="department">Department</label>
						    <input type="text" class="form-control" id="department" name="department">
						  </div>
						  <div class="form-group">
						    <label for="degree">Degree</label>
						    <input type="text" class="form-control" id="degree" name="degree">
						  </div>
						  <div class="form-group">
						    <label for="joiningyear">Joining year</label>
						    <input type="number" class="form-control" id="joiningyear" name="joiningyear">
						  </div>
						  <div class="form-group">
						    <label for="mobnum">Mobile Number</label>
						    <input type="text" class="form-control" id="mobnum" name="mobnum">
						  </div>
						  
						  <div class="form-group">
						    <label for="confirm_password">Confirm Password</label>
						    <input type="password" class="form-control" id="confirm_password" name="confirm_password">
						  </div>
			    	</div>
	    		  </div>

	    		  <div class="form-group text-center">
				  	<button type="submit" class="btn btn-primary" name="submit">Create Profile</button>
				  	<button type="reset" class="btn btn-primary" name="reset">Reset</button>
				  </div>

				</form>
		    	
		    </p>
		    
		  </div>
		  <div class="card-footer text-muted text-center">
		   	You don't need to register again if you already have a profile.
		   	<br>
		   	Click here to <a href="login.php">Login</a>
		  </div>
		</div>


	</div>

</body>
</html>

<?php

	echo "<center>";

	if(isset($_POST['submit']))
	{
		echo "<div class='container alert alert-primary mt-5' style='width: 800px;'>";
		echo "<font color='red' size='5px'>";
		if(empty($_POST['name']))
		{
			echo "!!!Name cannot be empty!!!";
			echo "</font>";

		}
		else if(empty($_POST['email']))
		{
			echo "!!!Email id cannot be empty!!!";
			echo "</font>";

		}
		else if(empty($_POST['degree']))
		{
			echo "!!!Degree cannot be empty!!!";
			echo "</font>";

		}
		else if(empty($_POST['department']))
		{
			echo "!!!Department cannot be empty!!!";
			echo "</font>";

		}
		else if(empty($_POST['joiningyear']))
		{
			echo "!!!Joining Year cannot be empty!!!";
			echo "</font>";

		}
		else if(empty($_POST['password']))
		{
			echo "!!!Kindly create a password!!!";
			echo "</font>";

		}
		else if(empty($_POST['confirm_password']))
		{
			echo "!!!Kindly confirm your password!!!";
			echo "</font>";

		}
		else if($_POST['password']!=$_POST['confirm_password'])
		{
			echo "!!!Your passwords did not match!!!";
			echo "</font>";

		}
		else if(empty($_POST['dob']))
		{
			echo "!!!DOB cannot be empty!!!";
			echo "</font>";

		}
		else if(empty($_POST['gender']))
		{
			echo "!!!Gender cannot be empty!!!";
			echo "</font>";

		}
		else if(empty($_POST['mobnum']))
		{
			echo "!!!Mobile No. cannot be empty!!!";
			echo "</font>";

		}
		
		else
		{
			echo "</font>";
			$link=mysqli_connect("localhost","root","") or die("MySql server couldn't connect!!!");
			mysqli_select_db($link,"csdp") or die("Database couldn't connect!!!");
			$name=$_POST['name'];
			$userid=$_POST['email'];
			$department=$_POST['department'];
			$degree=$_POST['degree'];
			$joiningyear=$_POST['joiningyear'];
			$password=$_POST['password'];
			$dob=$_POST['dob'];
			$gender=$_POST['gender'];
			$mobnumber=$_POST['mobnum'];
			$status="faclt";

			$insert_in_loginmaster="insert into loginmaster values ('$userid','$password','$status')";
			$insert_in_facultymaster="insert into facultymaster values ('$userid','$department','$degree','$joiningyear')";
			$insert_in_facultypersonalmaster="insert into facultypersonalmaster values ('$userid','$name','$dob','$gender','$mobnumber')";

			$row1=mysqli_query($link,$insert_in_loginmaster) or die("Query 1 not executed");
			$row2=mysqli_query($link,$insert_in_facultymaster) or die("Query 2 not executed");
			$row3=mysqli_query($link,$insert_in_facultypersonalmaster) or die("Query 3 not executed");

			if(mysqli_affected_rows($link)>0)
			{
				echo "<font color='green' size='5px'>-- Congratulations!!! Your profile has been created successfully --</font>";
			}
			else
			{
				echo "<font color='red' size='8px'>!!!Profile creation failed!!!</font>";
			}

			echo "</div>";

			mysqli_close($link);

		}

	}

	echo "</center>";
	include_once("footer.php");

?>