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
        <label> Album: </label>
        <input type="test" name="album" placeholder="album"/> <br>
        <label> Artist: </label>
        <input type="test" name="artist" placeholder="artist"/> <br>
       
        <input type="submit" name="search" value="Delete"/> <br>
        <br> <br> <br> <br> <br>

        <input type="submit" name="back" value="Go Back"/> <br>
</body>
</html>

<?php


        if(isset($_POST['search'])){
            $album = $_POST['album'];
            $artist = $_POST['artist'];
            $sql = "delete from audiolist where album = '$album' and artist = '$artist';";
            echo "Deleted";
            $result = mysqli_query($con, $sql);
        }
        if(isset($_POST['back'])){
            header("Location: employeeMenu.php");
            die;
        }
        
	 ?>