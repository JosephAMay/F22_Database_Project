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
        <label> First Name: </label>
        <input type="test" name="Fname" placeholder="Fname"/> <br>
        <label> Last Name: </label>
        <input type="test" name="Lname" placeholder="Lname"/> <br>
        <label> Card ID: </label>
        <input type="test" name="cardID" placeholder="cardID"/> <br>
        <label> Signup Date: </label>
        <input type="test" name="signup_date" placeholder="signup_date"/> <br>
        <label> Overdue: </label>
        <input type="test" name="overdue" placeholder="overdue"/> <br>
        <label> Fees: </label>
        <input type="test" name="fees" placeholder="fees"/> <br>
        <label> Address: </label>
        <input type="test" name="address" placeholder="address"/> <br>
        <label> Member of: </label>
        <input type="test" name="member_of" placeholder="member_of"/> <br>
        <label> Username: </label>
        <input type="test" name="username" placeholder="username"/> <br>
        <label> Password: </label>
        <input type="test" name="password" placeholder="password"/> <br>

       
        <input type="submit" name="search" value="Insert"/> <br>
        <br> <br> <br> <br> <br>

        <input type="submit" name="back" value="Go Back"/> <br>
</body>
</html>

<?php


        if(isset($_POST['search'])){
            $Fname = $_POST['Fname'];
            $Lname = $_POST['Lname'];
            $cardID = $_POST['cardID'];
            $signup_date = $_POST['signup_date'];
            $overdue = $_POST['overdue'];
            $fees = $_POST['fees'];
            $address = $_POST['address'];
            $member_of = $_POST['member_of'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $sql = "insert into cardholder values('$Fname','$Lname','$cardID','$signup_date','$overdue',$fees,'$address', '$member_of','$username','$password');";
            echo "Inserted";
            $result = mysqli_query($con, $sql);
        }
        if(isset($_POST['back'])){
            header("Location: employeeMenu.php");
            die;
        }
	 ?>