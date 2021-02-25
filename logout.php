<!DOCTYPE html>
<html>
<head>
	<title>Logout</title>
</head>
<body>

</body>
</html>
<?php  

	session_start();
	if(isset($_SESSION['userid']))
	{
		session_destroy();
		unset($_SESSION['userid']);
		unset($_SESSION['password']);
		unset($_SESSION['status']);

		header("location:login.php");
	}
	else
	{
		header("location:login.php");
	}

?>