<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	
	<title>Resume Builder</title>
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

	$src = $_FILES['photo']['tmp_name'];
	$des = $_SERVER['DOCUMENT_ROOT']."/csdp/images/".$_FILES['photo']['name'];
	$photo=$_FILES['photo']['name'];
	move_uploaded_file($src, $des);

	
?>
	
		<div class="row">
			<div class="col-md-2 container bg-warning sticky-top mt-5 mb-5" style="padding: 10px; margin-left: 20px; height: 550px; width: 200px;">
				<div class="dropdown" style="font-size: 20px;">
				  <span class="dropdown-item-text alert-primary">Dropdown Menu</span>
				  <a class="dropdown-item" href="student_page.php">Home</a>
				  <a class="dropdown-item" href="edit_academic.php">Edit Academic Achievements</a>
				  <a class="dropdown-item" href="edit_technical.php">Edit Technical Skills</a>
				  <a class="dropdown-item" href="faculty_for_student.php">List of Faculty</a>
				  <a class="dropdown-item" href="student_notice.php">Notice Board</a>
				  <a class="dropdown-item  active" href="resume_builder.php">Resume Builder</a>
				  <a class="dropdown-item" href="ebooks.php">Ebooks</a>
				  <a class="dropdown-item" href="student_scrap.php">Scrap Space</a>
				  <a class="dropdown-item" href="logout.php">Logout</a>
				</div>
			</div>

			<div class="container bg-info col-md-9 mt-5 mb-5 text-center" style="padding: 10px;">
				<br>
				<hr>
				<h1>Resume of Student</h1>
				<hr>
				<br><br>
				

					<div class="container bg-success mt-5 text-left" style="width: 2000px;">
						<div class="card">
							<div class="card-body">
							    <p class="card-text text-center">
							    	<br><br>
							    	<div style="width: 50%; float: right;">
						                <?php  
						                echo "<img src=images/".$photo." alt='photo' title='photo' width='150px' height='150px' style='margin-left: 400px;'>";
						                ?>
						            </div>
						            <br>
							    	<br>
							            <h2><u>Career Objective:</u></h2>
							            <p style="font-size: larger;">
							                To work for the progress of the organization and to establish myself in this work world eventually by utilizing my broad experience, Managerial and IT skills and can use my abilities to work with people to good use.
							            </p>

							            <br>
							            <h2><u>Strengths:</u></h2>
							                <ul style="font-size: larger;">
							                    <li>Strong interpersonal and leadership skill.</li>
							                    <li>Identifying Learner Needs.</li>
							                    <li>Maintain good relationships with students.</li>
							                    <li>Ability to design, author and test highly complex software for training programs.</li>
							                    <li>Ability to work independently or as a team member.</li>
							                    <li>Ability to generate clear and precise comments on presentation, readability and reusability of code</li>
							                    <li>Possess positive attitude and ability to meet organizations requirements</li>
							                    <li>Strong organizational and preparation skills.</li>
							                </ul>

							            <br>
							            <h2><u>Personal Details:</u></h2>
							            <p style="font-size: larger;">Name : <?php echo $_POST['name'];  ?></p>
							            <p style="font-size: larger;">DOB  : <?php echo $_POST['dob']; ?></p>

							            <br>
							            <h2><u>Educational Qualifications:</u></h2>
							            <p style="font-size: larger;">
							                <?php echo $_POST['edqual'];  ?>
							            </p>
							            
							            <br>
							            <h2><u>Academic Records:</u></h2>
							            <table cellpadding="5px" border="1px" cellspacing="0px">
							                <tr>
							                    <th>Examination</th>
							                    <th>Name of Degree</th>
							                    <th>Board/University</th>
							                    <th>Year of Passing</th>
							                    <th>Class/Division</th>
							                    <th>% Marks</th>
							                </tr>
							                <?php 
							                if(!empty($_POST['pgname']))
							                    echo "<tr>
							                    <td>Post Graduation</td>
							                    <td>".$_POST['pgname']."</td>
							                    <td>".$_POST['pgboard']."</td>
							                    <td>".$_POST['pgyop']."</td>
							                    <td>".$_POST['pgdivision']."</td>
							                    <td>".$_POST['pgmarks']."%</td>
							                </tr>";
							                 ?>
							                <tr>
							                    <td>Graduation</td>
							                    <td><?php echo $_POST['gname'];  ?></td>
							                    <td><?php echo $_POST['gboard'];  ?></td>
							                    <td><?php echo $_POST['gyop'];  ?></td>
							                    <td><?php echo $_POST['gdivision'];  ?></td>
							                    <td><?php echo $_POST['gmarks']."%";  ?></td>
							                </tr>
							                <tr>
							                    <td>Class XII</td>
							                    <td><?php echo $_POST['c12name'];  ?></td>
							                    <td><?php echo $_POST['c12board'];  ?></td>
							                    <td><?php echo $_POST['c12yop'];  ?></td>
							                    <td><?php echo $_POST['c12division'];  ?></td>
							                    <td><?php echo $_POST['c12marks']."%";  ?></td>
							                </tr>
							                <tr>
							                    <td>Class X</td>
							                    <td><?php echo $_POST['c10name'];  ?></td>
							                    <td><?php echo $_POST['c10board'];  ?></td>
							                    <td><?php echo $_POST['c10yop'];  ?></td>
							                    <td><?php echo $_POST['c10division'];  ?></td>
							                    <td><?php echo $_POST['c10marks']."%";  ?></td>
							                </tr>
							            </table>

							            <br>
							            <h2><u>Technical Expertise:</u></h2>
							            <p style="font-size: larger;"><?php echo $_POST['techexp'];  ?></p>
							                
							            <br>    
							            <h2><u>Experience:</u></h2>
							            <p style="font-size: larger;"><?php echo $_POST['experience'];  ?></p>

							            <br>
							            <h3 align="Center"><u>*ALL THE FURNISHED DETAILS ARE TRUE AND AUTHENTIC AS PER ORIGINAL DOCUMENTS*</u></h3>
							            
							            <br>
							            <p style="font-size: larger; text-align: right;"><?php echo $_POST['name'];  ?></p>
							        
							        </div>
							    	

								</p>
							</div>
						</div>
					</div>
			</div>
				
	<?php include_once("footer.php"); ?>

	
