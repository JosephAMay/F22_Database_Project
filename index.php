<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);  //Hello, <?php echo $user_data['user_name']; ?>


    

?>
<?php

if ($user_data[member_of] === "111111111")
$lname = 'Brooklyn Public Library';
else if ($user_data[member_of] === "123456789")
$lname = 'James E Walker Library';
else if ($user_data[member_of] === "987654321")
$lname = 'National Archives';
else $lname = 'undefined';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Library Management System</title>
</head>
<body>
    <a href="logout.php">Logout</a><br><br>
	<h1>Welcome to Library DBMS</h1>
    <p>
	<br>
	 Hello, <?php echo $user_data['Fname']; ?> <?php echo $user_data[Lname]; ?>

	 <br>
	<!-- //You are member of Library branch: <?php echo $user_data['member_of']; ?> -->
    You are member of Library branch: <?php echo $lname; ?>
	  <br>
	 You have been a member since: <?php echo $user_data['signup_date']; ?>
	  
	  <br>
	 Items overdue: <?php echo $user_data['overdue']; ?>

	  <br>
	 Late fees: <?php echo $user_data['fees']; ?> </p>
    
    <p>
    <a href="books.php">Click here to search for books</a> </p>

    <p>
    <a href="movies.php">Click here to search for movies</a> </p>
	 
    <p>
    <a href="audio.php">Click here to search for audio</a> </p>

    <p>
    <a href="returns.php">Click here to return books and view your account</a> </p>
    
    <p>
    <a href="returnmovie.php">Click here to return movies and view your account</a> </p>

    <p>
    <a href="returnaudio.php">Click here to return audio and view your account</a> </p>

</body>
</html>
