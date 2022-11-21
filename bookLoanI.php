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
        <label> Book Title: </label>
        <input type="test" name="bookTitle" placeholder="bookTitle"/> <br>
        <label> ISBN: </label>
        <input type="test" name="ISBN" placeholder="ISBN"/> <br>
        <label> Housed In: </label>
        <input type="test" name="housed_in" placeholder="housed_in"/> <br>

       
        <input type="submit" name="search" value="Insert"/> <br>
        <br> <br> <br> <br> <br>

        <input type="submit" name="back" value="Go Back"/> <br>
</body>
</html>

<?php


        if(isset($_POST['search'])){
            $cardID = $_POST['cardID'];
            $bookTitle = $_POST['bookTitle'];
            $ISBN = $_POST['ISBN'];
            $housed_in = $_POST['housed_in'];
            $sql = "insert into bookloan values($cardID,'$housed_in','$bookTitle','$ISBN', default , default , default);";
            echo "Inserted";
            $result = mysqli_query($con, $sql);
        }
        if(isset($_POST['back'])){
            header("Location: employeeMenu.php");
            die;
        }
	 ?>