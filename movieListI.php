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
        <label> Studio: </label>
        <input type="test" name="studio" placeholder="studio"/> <br>
        <label> Rating: </label>
        <input type="test" name="rating" placeholder="rating"/> <br>
        <label> Profit: </label>
        <input type="test" name="profit" placeholder="profit"/> <br>
        <label> Release Date: </label>
        <input type="test" name="release_date" placeholder="release_date"/> <br>
        <label> Title: </label>
        <input type="test" name="title" placeholder="title"/> <br>
        <label> Genre: </label>
        <input type="test" name="genre" placeholder="genre"/> <br>
        <label> Housed In: </label>
        <input type="test" name="housed_in" placeholder="housed_in"/> <br>
        <label> Number of Copies: </label>
        <input type="test" name="num_copies" placeholder="num_copies"/> <br>

       
        <input type="submit" name="search" value="Insert"/> <br>
        <br> <br> <br> <br> <br>


        <input type="submit" name="back" value="Go Back"/> <br></body></body>
</html>

<?php


        if(isset($_POST['search'])){
            $studio = $_POST['studio'];
            $rating = $_POST['rating'];
            $profit = $_POST['profit'];
            $release_date = $_POST['release_date'];
            $title = $_POST['title'];
            $genre = $_POST['genre'];
            $housed_in = $_POST['housed_in'];
            $num_copies = $_POST['num_copies'];
            $sql = "insert into movielist values('$title','$genre','$studio','$rating','$profit','$release_date','$housed_in',$num_copies);";
            echo "Inserted";
            $result = mysqli_query($con, $sql);
        }
        if(isset($_POST['back'])){
            header("Location: employeeMenu.php");
            die;
        }
	 ?>