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
        <label> Author First Name: </label>
        <input type="test" name="Auth_Fname" placeholder="Auth_Fname"/> <br>
        <label> Author Last Name: </label>
        <input type="test" name="Auth_Lname" placeholder="Auth_Lname"/> <br>
        <label> Publisher: </label>
        <input type="test" name="publisher" placeholder="publisher"/> <br>
        <label> ISBN: </label>
        <input type="test" name="ISBN" placeholder="ISBN"/> <br>
        <label> Title: </label>
        <input type="test" name="title" placeholder="title"/> <br>
        <label> Genre: </label>
        <input type="test" name="genre" placeholder="genre"/> <br>
        <label> Sub Genre: </label>
        <input type="test" name="sub_genre" placeholder="sub_genre"/> <br>
        <label> Housed In: </label>
        <input type="test" name="housed_in" placeholder="housed_in"/> <br>
        <label> Number of Copies: </label>
        <input type="test" name="num_copies" placeholder="num_copies"/> <br>

       
        <input type="submit" name="search" value="Insert"/> <br>
        <br> <br> <br> <br> <br>

        <input type="submit" name="back" value="Go Back"/> <br>
</body>
</html>

<?php


        if(isset($_POST['search'])){
            $Auth_Fname = $_POST['Auth_Fname'];
            $Auth_Lname = $_POST['Auth_Lname'];
            $publisher = $_POST['publisher'];
            $ISBN = $_POST['ISBN'];
            $title = $_POST['title'];
            $genre = $_POST['genre'];
            $sub_genre = $_POST['sub_genre'];
            $housed_in = $_POST['housed_in'];
            $num_copies = $_POST['num_copies'];
            $sql = "insert into booklist values('$Auth_Fname','$Auth_Lname','$publisher','$title',$num_copies,$housed_in,'$ISBN','$genre','$sub_genre');";
            echo "Inserted";
            $result = mysqli_query($con, $sql);
        }
        if(isset($_POST['back'])){
            header("Location: employeeMenu.php");
            die;
        }
	 ?>