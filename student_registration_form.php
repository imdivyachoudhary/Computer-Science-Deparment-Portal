<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<title>Student Registration Form</title>
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
		    <a class="nav-link active" href="student_registration_form.php">Student Registration</a>
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

	<div class="container bg-info mt-5" style="width: 800px;">


		<div class="card">
		  <div class="card-header text-center">
		    Create your profile
		  </div>
		  <div class="card-body">
		    <h3 class="card-title text-center" style="color: green;">Student Registration Form</h3>

		    <p class="card-text">

		    	<h5 class="text-center">*All the entries are compulsory*</h5>
		    	<br><br>
		    	<form action="student_registration_form.php" method="post">
		    		<div class="row">
		    			<div class="col-md-4">
		    				  <div class="form-group">
							    <label for="name">Name</label>
							    <input type="text" class="form-control" id="name" name="name">
							  </div>
							  <div class="form-group">
							    <label for="email">Email address</label>
							    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
							  </div>
							  <div class="form-group">
							    <label for="rollno">Roll No.</label>
							    <input type="number" class="form-control" id="rollno" name="rollno">
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
		    			</div>
		    			<div class="col-md-4">
		    				  <div class="form-group">
							    <label for="degree">Degree</label>
							    <select class="form-control" id="degree" name="degree">
							      <option>Select your degree</option>
							      <option value="B.Tech.">B.Tech.</option>
							      <option value="M.Tech.">M.Tech.</option>
							      <option value="B.C.A.">B.C.A.</option>
							      <option value="M.C.A.">M.C.A.</option>
							    </select>
							  </div>
							  <div class="form-group">
							    <label for="branch">Branch</label>
							    <select class="form-control" id="branch" name="branch">
							      <option>Select your branch</option>
							      <option value="C.S.E.">C.S.E.</option>
							      <option value="I.T.">I.T.</option>
								</select>
							  </div>
							  <div class="form-group">
							    <label for="joiningyear">Joining year</label>
							    <input type="number" class="form-control" id="joiningyear" name="joiningyear">
							  </div>
							  <div class="form-group">
							    <label for="batch">Batch (Year of passing)</label>
							    <input type="number" class="form-control" id="batch" name="batch">
							  </div>
							  							  
		    			</div>
		    			<div class="col-md-4">
		    				  <div class="form-group">
							    <label for="address">Address</label>
							    <textarea class="form-control" id="address" name="address" rows="2"></textarea>
							  </div>
		    				  <div class="form-group">
							    <label for="mobnum">Mobile Number</label>
							    <input type="text" class="form-control" id="mobnum" name="mobnum">
							  </div>
							  <div class="form-group">
							    <label for="password">Create Password</label>
							    <input type="password" class="form-control" id="password" name="password">
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
		else if(empty($_POST['rollno']))
		{
			echo "!!!Roll No. cannot be empty!!!";
			echo "</font>";

		}
		else if(empty($_POST['degree']))
		{
			echo "!!!Degree cannot be empty!!!";
			echo "</font>";

		}
		else if(empty($_POST['branch']))
		{
			echo "!!!Branch cannot be empty!!!";
			echo "</font>";

		}
		else if(empty($_POST['joiningyear']))
		{
			echo "!!!Joining Year cannot be empty!!!";
			echo "</font>";

		}
		else if(empty($_POST['batch']))
		{
			echo "!!!Batch (Year of passing) cannot be empty!!!";
			echo "</font>";

		}
		else if($_POST['batch']<=$_POST['joiningyear'])
		{
			echo "!!!Batch (Year of passing) must be greater than joinig year!!!";
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
		else if(empty($_POST['address']))
		{
			echo "!!!Address cannot be empty!!!";
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
			$rollno=$_POST['rollno'];
			$batch=$_POST['batch'];
			$branch=$_POST['branch'];
			$degree=$_POST['degree'];
			$joiningyear=$_POST['joiningyear'];
			$password=$_POST['password'];
			$dob=$_POST['dob'];
			$gender=$_POST['gender'];
			$address=$_POST['address'];
			$mobnumber=$_POST['mobnum'];
			$status="studn";

			$insert_in_loginmaster="insert into loginmaster values ('$userid','$password','$status')";
			$insert_in_studentmaster="insert into studentmaster values ('$userid','$rollno','$batch','$branch','$degree','$joiningyear')";
			$insert_in_studentpersonalmaster="insert into studentpersonalmaster values ('$userid','$name','$dob','$gender','$address','$mobnumber')";

			$row1=mysqli_query($link,$insert_in_loginmaster) or die("Query 1 not executed");
			$row2=mysqli_query($link,$insert_in_studentmaster) or die("Query 2 not executed");
			$row3=mysqli_query($link,$insert_in_studentpersonalmaster) or die("Query 3 not executed");

			if(mysqli_affected_rows($link)>0)
			{
				echo "<font color='green' size='5px'>-- Congratulations!!! Your profile has been created successfully --</font>";
			}
			else
			{
				echo "<font color='red' size='5px'>!!!Profile creation failed!!!</font>";
			}

			echo "</div>";

			mysqli_close($link);

		}

	}

	echo "</center>";
	include_once("footer.php");

?>