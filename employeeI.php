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
        <label> Minit: </label>
        <input type="test" name="minit" placeholder="minit"/> <br>
        <label> Salary: </label>
        <input type="test" name="salary" placeholder="salary"/> <br>
        <label> Managed by: </label>
        <input type="test" name="managed_by" placeholder="managed_by"/> <br>
        <label> ssn: </label>
        <input type="test" name="ssn" placeholder="ssn"/> <br>
        <label> Home Address: </label>
        <input type="test" name="home_address" placeholder="home_address"/> <br>
        <label> Work Location: </label>
        <input type="test" name="workLocation" placeholder="workLocation"/> <br>
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
            $minit = $_POST['minit'];
            $salary = $_POST['salary'];
            $managed_by = $_POST['managed_by'];
            $ssn = $_POST['ssn'];
            $home_address = $_POST['home_address'];
            $workLocation = $_POST['workLocation'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $sql = "insert into employee values('$Fname','$Lname','$minit',$salary,'$managed_by','$ssn','$home_address', '$workLocation','$username','$password');";
            echo "Inserted";
            $result = mysqli_query($con, $sql);
        }
        if(isset($_POST['back'])){
            header("Location: employeeMenu.php");
            die;
        }
	 ?>