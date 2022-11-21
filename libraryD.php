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
        <label> Library ID: </label>
        <input type="test" name="libraryID" placeholder="libraryID"/> <br>
       
        <input type="submit" name="search" value="Delete"/> <br>
        <br> <br> <br> <br> <br>

        <input type="submit" name="back" value="Go Back"/> <br></body>
</html>

<?php


        if(isset($_POST['search'])){
            $libraryID = $_POST['libraryID'];
            $sql = "delete from library where libraryID = $libraryID;";
            echo "Deleted";
            $result = mysqli_query($con, $sql);
        }
        if(isset($_POST['back'])){
            header("Location: employeeMenu.php");
            die;
        }
	 ?>