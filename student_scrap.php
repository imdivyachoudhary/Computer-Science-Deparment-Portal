<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	
	<title>Scrap Page</title>
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
				  <a class="dropdown-item" href="student_page.php">Home</a>
				  <a class="dropdown-item" href="edit_academic.php">Edit Academic Achievements</a>
				  <a class="dropdown-item" href="edit_technical.php">Edit Technical Skills</a>
				  <a class="dropdown-item" href="faculty_for_student.php">List of Faculty</a>
				  <a class="dropdown-item" href="student_notice.php">Notice Board</a>
				  <a class="dropdown-item" href="resume_builder.php">Resume Builder</a>
				  <a class="dropdown-item" href="ebooks.php">Ebooks</a>
				  <a class="dropdown-item  active" href="student_scrap.php">Scrap Space</a>
				  <a class="dropdown-item" href="logout.php">Logout</a>
				</div>
			</div>

			<div class="container bg-info col-md-9 mt-5 mb-5 text-center" style="padding: 10px;">
				<br>
				<hr>
				<h1>Scrap Space</h1>
				<hr>
				<br><br>
				

				<div class="container bg-info mt-5 text-left" style="width: 600px;">

					<div class="card">
					 
					  <div class="card-body">
					    <h3 class="card-title text-center" style="color: green;">Ask your Questions</h3>

					    <p class="card-text">

					    	
					    	<br><br>
					    	<form action="student_scrap.php" method="post">
				    		 
				    		  <div class="form-group">
							    <label for="question">Enter your question</label>
							    <textarea class="form-control" id="question" name="question" rows="3"></textarea>
							  </div>

							  <div class="form-group">
							    <label for="facultyid">Whom do you want to ask</label>
							    <select class="form-control" id="facultyid" name="facultyid">
							    	<option value="">Select faculty</option>
							    	<?php  

							    		$select="select * from facultypersonalmaster join facultymaster where facultymaster.userid=facultypersonalmaster.userid";
							    		$show=mysqli_query($link,$select) or die("The query couldn't execute!!!");
							    		while($row=mysqli_fetch_array($show))
							    		{
							    			$faculty=$row['userid'];
							    			$name=$row['name'];
							    			$department=$row['department'];
							    			echo "<option value='$faculty'>$name ($department)</option>";
							    		}

							    	?>

							    </select>
							  </div>	
							    
							  <div class="form-group text-center">
							  	<button type="submit" class="btn btn-primary" name="submit">Ask</button>
							  	<button type="reset" class="btn btn-primary" name="reset">Reset</button>
							  </div>
							  
							</form>
					    	
					    </p>
					    
					  </div>
					</div>
				</div>

				<?php  
					echo "<center>";
					
						if(isset($_POST['submit']))
						{
							if(!empty($_POST['question']) )
							{
								if(!empty($_POST['facultyid']))
								{
									$flag=0;
									$facultyid=$_POST['facultyid'];
									$question=$_POST['question'];
									$dateasked=date("y-m-d");
									$insert="insert into scrapspace(studentid,facultyid,question,dateasked) values ('$userid','$facultyid','$question','$dateasked')";
									$row=mysqli_query($link,$insert) or die("The query 1 couldn't execute!!!");
									if(mysqli_affected_rows($link)>0)
									{
										$flag=1;	
									}
									if($flag==1)
									{
										echo "<div class='container alert alert-primary mt-5 text-center'";
										echo "<font color='green' size='5px'>";
										echo "Your question is posted successfully";
										echo "</font></div>";
									}

									else
									{
										echo "<div class='container alert alert-primary mt-5 text-center'";
										echo "<font color='red' size='5px'>";
										echo "Your question couldn't be posted";
										echo "</font></div>";
									}
								}
								
								else
								{
									echo "<div class='container alert alert-primary mt-5 text-center'";
									echo "<font color='red' size='5px'>";
									echo "Please enter the faculty whom you want to ask!!! ";
									echo "</font></div>";
								}
							}
							
							
						}
					echo "</center>";
					
				?>
			
				<div class="container bg-success mt-5 text-left" style="width: 800px;">
							<div class="card">
								<div class="card-body">
								    <p class="card-text text-center">
								    	<br><br>
								    	
								    	<?php  
		
											$select="select * from scrapspace where studentid='$userid' order by dateasked desc"; 
											$show=mysqli_query($link,$select) or die("The query couldn't execute!!!");
											
											while($row=mysqli_fetch_array($show))
											{
												echo "<hr>";
												echo "Question : ".$row['question']."<br>";
												echo "Asked on : ".$row['dateasked']."<br>";
												echo "Answered on : ".$row['dateanswered']."<br>";
												echo "Answer : ".$row['answer']."<br>";
												echo "<hr>";
											}

								    	?>

									</p>
								</div>
							</div>
						</div>
		

				</div>
			</div>

	<?php include_once("footer.php"); ?>