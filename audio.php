<?php
session_start();

    include("connection.php");
    include("functions.php");

    $user_data = check_login($con);


if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `audiolist` WHERE CONCAT(`album`, `artist`, `genre`, `sub_genre`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}

if(isset($_POST['borrow']))
{
    $borrow_cardid = $user_data['cardID'];
    $borrow_housed = $_POST['housed'];
    $borrow_title = $_POST['artist'];
    $borrow_album = $_POST['album'];
    $borrow_isbn = $_POST['album'];
    $borrow_query = "INSERT INTO audioLoan
        (cardID,housed_in,artistName,albumName) values
        ('$borrow_cardid', '$borrow_housed', '$borrow_title', '$borrow_isbn')";
    //$insert_result = insertintotable($borrow_query);
    insertintotable($borrow_query);

}

/*
 else {
    $query = "SELECT * FROM `audiolist`";
    $search_result = filterTable($query);
}*/
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "root", "libraryDB2");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

function insertintotable($query)
{
    $connect = mysqli_connect("localhost", "root", "root", "libraryDB2");
    mysqli_query($connect, $query);
    
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>PHP HTML TABLE DATA SEARCH</title>
        <style>
            table,tr,th,td
            {
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
        <a href="index.php">Back to home</a><br><br>
        <h1>This is the Audio Search</h1>
        <form action="audio.php" method="post">
            <input type="text" name="valueToSearch" placeholder="Value To Search"><br><br>
            <input type="submit" name="search" value="Search"><br><br>
            
            <table>
                <tr>
                    <th>Album</th>
                    <th>Artist</th>
                    <th>Genre/th>
                    <th>Sub Genre</th>
                    <th>Housed In</th>
                </tr>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['album'];?></td>
                    <td><?php echo $row['artist'];?></td>
                    <td><?php echo $row['genre'];?></td>
                    <td><?php echo $row['sub_genre'];?></td>
                    <td><?php echo $row['housed_in'];?></td>
                </tr>
                <?php endwhile;?>
            </table>
        </form>
<!-- new additions -->
        <br>
        <h2>Borrow a Album</h2>
        <p>Insert all fields to checkout a book</p>

        <form action="audio.php" method="post">
              <label for="housed">Housed in:</label><br>
              <input type="text" id="housed" name="housed"><br>
              <label for="artist">Artist:</label><br>
              <input type="text" id="artist" name="artist"><br><br>
              <label for="album">Album:</label><br>
              <input type="text" id="album" name="album"><br>
              <input type="submit" name ="borrow" value="Submit">

              
            </form>
        
    </body>
</html>
