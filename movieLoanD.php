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
        <label> Transaction Number: </label>
        <input type="test" name="transactionNum" placeholder="transactionNum"/> <br>
       
        <input type="submit" name="search" value="Delete"/> <br>
        <br> <br> <br> <br> <br>


        <input type="submit" name="back" value="Go Back"/> <br></body>
</html>

<?php


        if(isset($_POST['search'])){
            $transactionNum = $_POST['transactionNum'];
            $sql = "delete from movieloan where transactionNum= $transactionNum ;";
            echo "Deleted";
            $result = mysqli_query($con, $sql);
        }
        if(isset($_POST['back'])){
            header("Location: employeeMenu.php");
            die;
        }
	 ?>