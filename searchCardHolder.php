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
        <input type="test" name="cardID" placeholder="Enter the first Name"/> <br>

       
        <input type="submit" name="search" value="Seach Database"/> <br>
        <br> <br> <br> <br> <br>

        <input type="submit" name="back" value="Go Back"/> <br>
</body>
</html>

<?php


        if(isset($_POST['search'])){
            $cardID = $_POST['cardID'];
            $sql = "select * from cardholder where cardID = $cardID";
            $result = mysqli_query($con, $sql);
            $resultCheck = mysqli_num_rows($result);

            if ($resultCheck > 0){
                while($row = mysqli_fetch_assoc($result)) {
                    echo "Name: " . $row['Fname'] .  ' ' . $row['Lname'] . "<br>" . "Overdue: " . $row['overdue'] . "<br>" . "Fees: " . $row['fees'] . "<br>" . "Member of: " . $row['member_of'] . "<br>";
                }
            }
        }
        if(isset($_POST['back'])){
            header("Location: employeeMenu.php");
            die;
        }
        
	 ?>