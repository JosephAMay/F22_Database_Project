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
        <label> Release Date: </label>
        <input type="test" name="release_date" placeholder="release date"/> <br>
        <label> Album: </label>
        <input type="test" name="album" placeholder="album"/> <br>
        <label> Artist: </label>
        <input type="test" name="artist" placeholder="artist"/> <br>
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
            $release_date = $_POST['release_date'];
            $album = $_POST['album'];
            $artist = $_POST['artist'];
            $genre = $_POST['genre'];
            $sub_genre = $_POST['sub_genre'];
            $housed_in = $_POST['housed_in'];
            $num_copies = $_POST['num_copies'];
            $sql = "insert into audiolist values('$release_date','$album','$artist','$genre','$sub_genre',$housed_in,$num_copies);";
            echo "Inserted";
            $result = mysqli_query($con, $sql);
        }
        if(isset($_POST['back'])){
            header("Location: employeeMenu.php");
            die;
        }
        
	 ?>