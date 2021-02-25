<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<title>Login</title>
</head>
<body class="bg-dark">

	<?php include_once("header.php"); ?>

	<div class="container-fluid sticky-top" style="background-color: pink; font-size: 30px; padding: 10px;">
		<ul class="nav nav-pills">
		  <li class="nav-item">
		    <a class="nav-link active" href="login.php">Home</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" href="about.php">About Us</a>
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

	<div class="container bg-info mt-5" style="width: 800px;">


		<div class="card">
		  <div class="card-header text-center">
		    Enter your userid and password
		  </div>
		  <div class="card-body">
		    <h3 class="card-title text-center" style="color: green;">Login</h3>

		    <p class="card-text">

		    	<br><br>
		    	<form action="login.php" method="post">
	    		  <div>
				    <label for="email">Email address</label>
				    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
				  </div>
				 
				  <div class="form-group">
				    <label for="password">Password</label>
				    <input type="password" class="form-control" id="password" name="password">
				  </div>

				  <div class="form-group">
				    <label for="captcha">Enter the Captcha</label>
				    <input type="text" class="form-control" id="captcha" name="captcha">
				  </div>
				  <br><br><img src="captcha.php"><br><br>
				  <div class="form-group text-center">
				  	<button type="submit" class="btn btn-primary" name="submit">Login</button>
				  	<button type="reset" class="btn btn-primary" name="reset">Reset</button>
				  </div>
				</form>
		    	
		    </p>
		    
		  </div>
		  <div class="card-footer text-muted text-center">
		   	If you don't have a profile, create now.
		   	<br>
		   	To register as a student <a href="student_registration_form.php">Click here</a>
		   	<br>
		   	To register as a faculty <a href="faculty_registration_form.php">Click here</a>
		  </div>
		</div>


	</div>

</body>
</html>

<?php  

	session_start();
	if(isset($_POST['submit']))
	{
		if(empty($_POST['email']) || empty($_POST['password']))
		{
			echo "<div class='container alert alert-primary mt-5 text-center' style='width: 800px;'>";
			echo "<font color='red' size='5px'>";
			echo "!!!Please enter userid(email id) and password!!!";
			echo "</font></div>";
		}
		if($_POST['captcha']!=$_SESSION['captcha'])
		{
			echo "<div class='container alert alert-primary mt-5 text-center' style='width: 800px;'>";
			echo "<font color='red' size='5px'>";
			echo "!!!You entered wrong captcha!!!";
			echo "</font></div>";
		}
		else
		{
			$link=mysqli_connect("localhost","root","") or die("MySql server couldn't connect!!!");
			mysqli_select_db($link,"csdp") or die("Database couldn't connect!!!");
			$userid=$_POST['email'];
			$password=$_POST['password'];

			$select="select * from loginmaster where userid='$userid' and password='$password'";
			$show=mysqli_query($link,$select);

			if($row=mysqli_fetch_array($show))
			{
				$_SESSION['userid']=$row['userid'];
				$_SESSION['password']=$row['password'];
				$_SESSION['status']=$row['status'];

				if($row['status']=="studn")
				{
					header("location:student_page.php");
				}
				else if($row['status']=='faclt')
				{
					header("location:faculty_page.php");
				}
				else if($row['status']=='admin')
				{
					header("location:admin_page.php");	
				}

			}

			else
			{
				echo "<div class='container alert alert-primary mt-5 text-center' style='width: 800px;'>";
				echo "<font color='red' size='5px'>";
				echo "!!!Please enter valid userid(email id) and password!!!";
				echo "</font></div>";
			}

			mysqli_close($link);

		}
	}
	
	include_once("footer.php");

?>