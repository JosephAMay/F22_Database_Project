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
        <label> Location Name: </label>
        <input type="test" name="Locationname" placeholder="Locationname"/> <br>
        <label> Address: </label>
        <input type="test" name="address" placeholder="address"/> <br>
        <label> Library ID: </label>
        <input type="test" name="libraryID" placeholder="libraryID"/> <br>
        <label> Membership Fee: </label>
        <input type="test" name="membershipFee" placeholder="membershipFee"/> <br>

       
        <input type="submit" name="search" value="Insert"/> <br>
        <br> <br> <br> <br> <br>


        <input type="submit" name="back" value="Go Back"/> <br></body>
</html>

<?php


        if(isset($_POST['search'])){
            $Locationname = $_POST['Locationname'];
            $address = $_POST['address'];
            $libraryID = $_POST['libraryID'];
            $membershipFee = $_POST['membershipFee'];
            $sql = "insert into library values('$Locationname','$address','$libraryID','$membershipFee');";
            echo "Inserted";
            $result = mysqli_query($con, $sql);
        }
        if(isset($_POST['back'])){
            header("Location: employeeMenu.php");
            die;
        }
	 ?>