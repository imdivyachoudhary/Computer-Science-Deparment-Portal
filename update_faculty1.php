<?php

	echo "<center>";
	session_start();
		if(!isset($_SESSION['userid']))
		{
			header("location:login.php");
		}

	$userid=$_SESSION['edit'];
	
	if(isset($_POST['submit']))
	{
		
		$link=mysqli_connect("localhost","root","") or die("MySql server couldn't connect!!!");
		mysqli_select_db($link,"csdp") or die("Database couldn't connect!!!");

		$select="select status from loginmaster where userid='$userid'";
		$show=mysqli_query($link,$select) or die("The query 1 couldn't execute!!!");
		
		$row=mysqli_fetch_array($show);
		$status=$row['status'];
	
		$flag=0;
			if(!empty($_POST['name']))
			{
				$name=$_POST['name'];
				$update1="update facultypersonalmaster set name='$name' where userid='$userid'";
				$u=mysqli_query($link,$update1) or die("The query 1 couldn't execute!!!");
				$flag=1;

			}
			if(!empty($_POST['dob']))
			{
				$dob=$_POST['dob'];
				$update2="update facultypersonalmaster set dob='$dob' where userid='$userid'";
				$u=mysqli_query($link,$update2) or die("The query 2 couldn't execute!!!");
				$flag=1;

			}
			if(!empty($_POST['gender']))
			{
				$gender=$_POST['gender'];
				$update3="update facultypersonalmaster set gender='$gender' where userid='$userid'";
				$u=mysqli_query($link,$update3) or die("The query 3 couldn't execute!!!");
				$flag=1;

			}
			
			if(!empty($_POST['mobnum']))
			{
				$mobnumber=$_POST['mobnum'];
				$update5="update facultypersonalmaster set mobnumber='$mobnumber' where userid='$userid'";
				$u=mysqli_query($link,$update5) or die("The query 5 couldn't execute!!!");
				$flag=1;
			}
			

			
			if(!empty($_POST['degree']))
			{
				$degree=$_POST['degree'];
				$update6="update facultymaster set degree='$degree' where userid='$userid'";
				$u=mysqli_query($link,$update6) or die("The query 6 couldn't execute!!!");
				$flag=1;
			}
			if(!empty($_POST['department']))
			{
				$department=$_POST['department'];
				$update7="update facultymaster set department='$department' where userid='$userid'";
				$u=mysqli_query($link,$update7) or die("The query 7 couldn't execute!!!");
				$flag=1;
			}
			if(!empty($_POST['joiningyear']))
			{
				$joiningyear=$_POST['joiningyear'];
				$update8="update facultymaster set joiningyear='$joiningyear' where userid='$userid'";
				$u=mysqli_query($link,$update8) or die("The query 8 couldn't execute!!!");
				$flag=1;
			}
			
			if($flag==1)
			{
				header("location:list_of_faculty.php");
			}

			else
			{
				echo "<div class='container alert alert-primary mt-5 text-center'";
				echo "<font color='red' size='5px'>";
				echo "Updation of user $userid failed";
				echo "</font></div>";
			}

		
		
	}

	
		
?>