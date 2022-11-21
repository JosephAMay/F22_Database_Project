<?php 
session_start();

	include("connection.php");
	include("functions.php");

?>

<!\<!DOCTYPE html>
<html>
<head>
	<title>Employee Website</title>
</head>
<body>

    <form action="" method="POST">
        <input type="submit" name="employeeS" value="Search For Employee"/> <br>

        <input type="submit" name="cardS" value="Search for Card Holder"/> <br>

        <input type="submit" name="IorD" value="Insert or delete"/> <br>
       
        <input type="submit" name="search" value="Seach Library Database"/> <br>
        <br> <br> <br> <br> <br>

        <input type="submit" name="back" value="Go Back"/> <br>
</body>
</html>

<?php


        if(isset($_POST['employeeS'])){
                header("Location: employeeSearch.php");
			die;
            }
        if(isset($_POST['cardS'])){
                header("Location: searchCardHolder.php");
			die;
            }
        if(isset($_POST['IorD'])){
                header("Location: tableSelection.php");
			die;
            }
        if(isset($_POST['search'])){
                header("Location: searchDatabase.php");
			die;
            }
        if(isset($_POST['back'])){
                header("Location: login.php");
                die;
            }
        
	 ?>