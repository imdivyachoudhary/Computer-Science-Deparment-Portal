<?php
	
		session_start();
		if(!isset($_SESSION['userid']))
		{
			header("location:login.php");
		}

					$link=mysqli_connect("localhost","root","") or die("MySql server couldn't connect!!!");
					mysqli_select_db($link,"csdp") or die("Database couldn't connect!!!");

					if(isset($_POST['submit']))
					{
						if($_POST['password']!=$_SESSION['password'])
						{
							echo "<div class='container alert alert-primary mt-5 text-center'";
							echo "<font color='red' size='5px'>";
							echo "!!!You entered invalid password!!!";
							echo "</font></div>";
						}
						else
						{
							
							$flag=0;
							$select="select status from loginmaster where userid='$userid'";
							$show=mysqli_query($link,$select) or die("The query 1 couldn't execute!!!");
							$row=mysqli_fetch_array($show);
								$status=$row['status'];
							// {
							// 	$status="none";
							// }

							if($status=="studn")
							{
								$delete1="delete from studentmaster where userid='$userid'";
								$d=mysqli_query($link,$delete1) or die("The query 2 couldn't execute!!!");
								$delete2="delete from studentpersonalmaster where userid='$userid'";
								$d=mysqli_query($link,$delete2) or die("The query 3 couldn't execute!!!");
								$delete3="delete from studentacademicmaster where userid='$userid'";
								$d=mysqli_query($link,$delete3) or die("The query 4 couldn't execute!!!");
								$delete4="delete from studenttechnicalmaster where userid='$userid'";
								$d=mysqli_query($link,$delete4) or die("The query 5 couldn't execute!!!");
								$delete5="delete from loginmaster where userid='$userid'";
								$d=mysqli_query($link,$delete5) or die("The query 6 couldn't execute!!!");
								echo "<div class='container alert alert-primary mt-5 text-center'";
								echo "<font color='green' size='5px'>";
								echo "Removed user $userid successfully";
								echo "</font></div>";
								$flag=1;
							}
							else if($status=="faclt")
							{
								$delete1="delete from facultymaster where userid='$userid'";
								$d=mysqli_query($link,$delete1) or die("The query 7 couldn't execute!!!");
								$delete2="delete from facultypersonalmaster where userid='$userid'";
								$d=mysqli_query($link,$delete2) or die("The query 8 couldn't execute!!!");
								$delete3="delete from noticemaster where userid='$userid'";
								$d=mysqli_query($link,$delete3) or die("The query 9 couldn't execute!!!");
								$delete4="delete from loginmaster where userid='$userid'";
								$d=mysqli_query($link,$delete4) or die("The query 10 couldn't execute!!!");	
								echo "<div class='container alert alert-primary mt-5 text-center'";
								echo "<font color='green' size='5px'>";
								echo "Removed user $userid successfully";
								echo "</font></div>";
								$flag=1;
							}
							
							header("location:../remove_user.php?flag=$flag");
						}
					}

				?>