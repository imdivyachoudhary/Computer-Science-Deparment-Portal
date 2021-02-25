<?php

		session_start();
		if(!isset($_SESSION['userid']))
		{
			header("location:login.php");
		}
		$sno=$_SESSION['remove'];

					$link=mysqli_connect("localhost","root","") or die("MySql server couldn't connect!!!");
					mysqli_select_db($link,"csdp") or die("Database couldn't connect!!!");

					if(isset($_POST['submit']))
					{

						if($_POST['password']!=$_SESSION['password'])
						{
							echo "<div class='container alert alert-primary mt-5 text-center'";
							echo "<font color='red' size='5px'>";
							echo "!!!You entered incorrect password!!!";
							echo "</font></div>";
						}
						else
						{
							
								$delete1="delete from noticemaster where sno='$sno'";
								$d=mysqli_query($link,$delete1) or die("The query 2 couldn't execute!!!");
								
								echo "<font color='green' size='5px'>";
								echo "Removed notice $title successfully";
								echo "</font></div>";
						}
					}

				?>