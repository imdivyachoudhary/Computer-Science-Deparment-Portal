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
				  <a class="dropdown-item" href="faculty_page.php">Home</a>
				  <a class="dropdown-item" href="student_batch.php">List of Students</a>
				  <a class="dropdown-item" href="faculty_notice.php">Notice Board</a>
				  <a class="dropdown-item" href="upload_notice.php">Upload Notice</a>
				  <a class="dropdown-item" href="faculty_ebooks.php">Ebooks</a>
				  <a class="dropdown-item" href="upload_ebook.php">Upload Ebook</a>
				  <a class="dropdown-item  active" href="faculty_scrap.php">Scrap Space</a>
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
					    <h3 class="card-title text-center" style="color: green;">Post the Answers</h3>

					    <p class="card-text">
					    	
					    	<br><br>
					    	
							    	<?php  
		
											$select="select * from scrapspace where facultyid='$userid' and answer='Not answered yet' order by dateasked desc"; 
											$show=mysqli_query($link,$select) or die("The query couldn't execute!!!");
											
											while($row=mysqli_fetch_array($show))
											{
												echo "<hr>";
												echo "Question : ".$row['question']."<br>";
												echo "Asked on : ".$row['dateasked']."<br>";
												echo "<form action='faculty_scrap.php' method='post'>";
				    		 
									    		 echo "<div class='form-group'>
										    			<label for='answer'>Post Answer</label>
												    	<textarea class='form-control' id='answer' name='answer' rows='3'></textarea>
												  		</div>";

												echo "<div class='form-group text-center'>
													  	<button type='submit' class='btn btn-primary' name='submit'>Post</button>
													  	<button type='reset' class='btn btn-primary' name='reset'>Reset</button>
													  </div>";
													  
												echo "</form>";

												if(isset($_POST['submit']))
												{
													$dateanswered=date("y-m-d");
													$answer=$_POST['answer'];
													$sno=$row['sno'];
													$update="update scrapspace set answer='$answer',dateanswered='$dateanswered' where sno='$sno'"; 
													$show=mysqli_query($link,$update) or die("The query couldn't execute!!!");

												}
												echo "<hr>";
											}

							    	?>
							    
							 
					    	
					    </p>
					    
					  </div>
					</div>
				


				
				<div class="container bg-success mt-5 text-left" style="width: 800px;">
							<div class="card">
								<div class="card-body">
								    <p class="card-text text-center">
								    	<br><br>
								    	
								    	<?php  
		
											$select="select * from scrapspace where facultyid='$userid' and answer!='Not answered yet' order by dateasked desc"; 
											$show=mysqli_query($link,$select) or die("The query couldn't execute!!!");
											
											while($row=mysqli_fetch_array($show))
											{
												echo "<hr>";
												echo "Question : ".$row['question']."<br>";
												echo "Asked on : ".$row['dateasked']."<br>";
												echo "Answered on : ".$row['dateanswered']."<br>";
												echo "Your Answer : ".$row['answer']."<br>";
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