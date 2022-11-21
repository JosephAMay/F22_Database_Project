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
        <label> Title: </label>
        <input type="test" name="title" placeholder="Enter the Title"/> <br>
        <label> Type: </label>
        <select name = "type">
            <option value="bookList"> BOOK </option>
            <option value="audioList"> AUDIO </option>
            <option value="movieList"> MOVIE </option>

       
        <input type="submit" name="search" value="Seach Database"/> <br>
        <br> <br> <br> <br> <br>

        <input type="submit" name="back" value="Go Back"/> <br>
</body>
</html>

<?php


        if(isset($_POST['search'])){
            $title = $_POST['title'];
            $type = $_POST['type'];
            if($type == 'bookList'){
                $sql = "select * from $type where title = '$title'";
                $result = mysqli_query($con, $sql);
                $resultCheck = mysqli_num_rows($result);

                if ($resultCheck > 0){
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "Author Name: " . $row['Auth_Fname'] . " " . $row['Auth_Lname'] . "<br>" . "Publisher: " . $row['publisher'] . "<br>" . "Title: " . $row['title'] . "<br>"
                        . "Number of Copies: " . $row['num_copies'] . "<br>" . "ISBN: " . $row['ISBN'] . "<br>" . "Genre: " . $row['genre'] . "<br>";
                    }
                }
            }
            if($type == 'audio'){
                $sql = "select * from $type where album = '$title'";
                $result = mysqli_query($con, $sql);
                $resultCheck = mysqli_num_rows($result);

                if ($resultCheck > 0){
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "Release Date: " . $row['release_date'] . "<br>" . "Album: " . $row['album'] . "<br>" . "Artist: " . $row['artist'] . "<br>" . "Genre: " . $row['genre'] . "<br>"
                        . "Number of Copies: " . $row['num_copies'] . "<br>";
                    }
                }
            }
            if($type == 'movie'){
                $sql = "select * from $type where title = '$title'";
                $result = mysqli_query($con, $sql);
                $resultCheck = mysqli_num_rows($result);

                if ($resultCheck > 0){
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "Title: " . $row['title'] . "<br>" . "Genre: " . $row['genre'] . "<br>" . "Studio: " . $row['studio'] . "<br>"
                        . "Release Date: " . $row['release_date'] . "<br>" . "Number of Copies: " . $row['num_copies'] . "<br>";
                    }
                }
            }
        }
        if(isset($_POST['back'])){
            header("Location: employeeMenu.php");
            die;
        }
        
	 ?>