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
        <label> Member of: </label>
        <input type="test" name="member_of" placeholder="member_of"/> <br>
       
        <input type="submit" name="search" value="Delete"/> <br>
        <br> <br> <br> <br> <br>

        <input type="submit" name="back" value="Go Back"/> <br>
</body>
</html>

<?php


        if(isset($_POST['search'])){
            $cardID = $_POST['cardID'];
            $member_of = $_POST['member_of'];
            $sql = "delete from cardholder where cardID = $cardID and member_of = '$member_of';";
            echo "Deleted";
            $result = mysqli_query($con, $sql);
        }
        if(isset($_POST['back'])){
            header("Location: employeeMenu.php");
            die;
        }
	 ?>