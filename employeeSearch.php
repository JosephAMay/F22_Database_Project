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
        <input type="test" name="firstName" placeholder="Enter the first Name"/> <br>
        <label> Last Name: </label>
        <input type="test" name="lastName" placeholder="Enter the last Name"/> <br>

       
        <input type="submit" name="search" value="Seach Database"/> <br>
        <br> <br> <br> <br> <br>

        <input type="submit" name="back" value="Go Back"/> <br>
</body>
</html>

<?php


        if(isset($_POST['search'])){
            $empF = $_POST['firstName'];
            $empL = $_POST['lastName'];
            $sql = "select * from employee where Fname = '$empF' and Lname = '$empL'";
            $result = mysqli_query($con, $sql);
            $resultCheck = mysqli_num_rows($result);

            if ($resultCheck > 0){
                while($row = mysqli_fetch_assoc($result)) {
                    echo "Name: " . $row['Fname'] . " " . $row['Lname'] . "<br>" . "Managed by: " . $row['managed_by'] . "<br>" . "Work Location: " . $row['workLocation'] . "<br>";
                }
            }
        }
        if(isset($_POST['back'])){
            header("Location: employeeMenu.php");
            die;
        }
        
	 ?>