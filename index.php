<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);  //Hello, <?php echo $user_data['user_name']; ?>

?>

<!DOCTYPE html>
<html>
<head>
	<title>My website</title>
</head>
<body>

	<a href="login.php">Logout</a>
	<h1>This is the index page Welcome to Library DBMS</h1>

	<br>
	 Hello, <?php echo $user_data['Fname']; ?> <?php echo $user_data[Lname]; ?>

	 <br>
	 You are member of Library branch: <?php echo $user_data['member_of']; ?>

	  <br>
	 You have been a member since: <?php echo $user_data['signup_date']; ?>
	  
	  <br>
	 Items overdue: <?php echo $user_data['overdue']; ?>

	  <br>
	 Late fees: <?php echo $user_data['fees']; ?>
	 


</body>
</html>