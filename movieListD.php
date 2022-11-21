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
        <label> Release Date: </label>
        <input type="test" name="release_date" placeholder="release_date"/> <br>
        <label> Title: </label>
        <input type="test" name="title" placeholder="title"/> <br>
       
        <input type="submit" name="search" value="Delete"/> <br>
        <br> <br> <br> <br> <br>


        <input type="submit" name="back" value="Go Back"/> <br>
</body>
</html>

<?php


        if(isset($_POST['search'])){
            $release_date = $_POST['release_date'];
            $title = $_POST['title'];
            $sql = "delete from movieList where release_date= '$release_date' and title = '$title';";
            echo "Deleted";
            $result = mysqli_query($con, $sql);
        }
        if(isset($_POST['back'])){
            header("Location: employeeMenu.php");
            die;
        }
	 ?>