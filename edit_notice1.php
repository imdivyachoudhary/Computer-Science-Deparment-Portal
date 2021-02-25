<?php

	echo "<center>";
	session_start();
	if(!isset($_SESSION['userid']))
	{
		header("location:login.php");
	}
	$sno=$_SESSION['edit'];

	$link=mysqli_connect("localhost","root","") or die("MySql server couldn't connect!!!");
	mysqli_select_db($link,"csdp") or die("Database couldn't connect!!!");

	
	if(isset($_POST['submit']))
	{
			$flag=0;
			
			
			$datenow=date("y-m-d");
			if(isset($_POST['title']))
			{
				$title=$_POST['title'];
				$update="update noticemaster set title='$title' where sno='$sno'";
				$u=mysqli_query($link,$update) or die("The query couldn't execute!!!");
				$flag=1;

			}
			if(!empty($_POST['content']))
			{
				$content=$_POST['content'];
				$update1="update noticemaster set content='$content' where sno='$sno'";
				$u=mysqli_query($link,$update1) or die("The query 1 couldn't execute!!!");
				$flag=1;

			}
			if(!empty($_POST['type']))
			{
				$type=$_POST['type'];
				$update2="update noticemaster set type='$type' where sno='$sno'";
				$u=mysqli_query($link,$update2) or die("The query 2 couldn't execute!!!");
				$flag=1;

			}
			
			if($flag==1)
			{
				$update3="update noticemaster set date='$datenow' where sno='$sno'";
				$u=mysqli_query($link,$update3) or die("The query 3 couldn't execute!!!");
				header("location:admin_notice.php");
			}

			else
			{
				echo "<div class='container alert alert-primary mt-5 text-center'";
				echo "<font color='red' size='5px'>";
				echo "Updation of notice $title failed";
				echo "</font></div>";
			}
		
	}

?>