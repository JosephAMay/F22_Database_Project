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
        <label> Card ID: </label>
        <input type="test" name="cardID" placeholder="cardID"/> <br>
        <label> Movie Title: </label>
        <input type="test" name="movieTitle" placeholder="movieTitle"/> <br>
        <label> Movie Release: </label>
        <input type="test" name="movie_release" placeholder="movie_release"/> <br>
        <label> Housed In: </label>
        <input type="test" name="housed_in" placeholder="housed_in"/> <br>

       
        <input type="submit" name="search" value="Insert"/> <br>
        <br> <br> <br> <br> <br>


        <input type="submit" name="back" value="Go Back"/> <br></body></body></body>
</html>

<?php


        if(isset($_POST['search'])){
            $cardID = $_POST['cardID'];
            $movieTitle = $_POST['movieTitle'];
            $movie_release = $_POST['movie_release'];
            $housed_in = $_POST['housed_in'];
            $sql = "insert into movieloan values($cardID,'$housed_in','$movieTitle','$movie_release', default , default , default);";
            echo "Inserted";
            $result = mysqli_query($con, $sql);
        }
        if(isset($_POST['back'])){
            header("Location: employeeMenu.php");
            die;
        }
	 ?>