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
    $query = "SELECT * FROM `movielist` WHERE CONCAT(`title`, `genre`, `studio`, `rating`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}

if(isset($_POST['borrow']))
{
    $borrow_cardid = $user_data['cardID'];
    $borrow_housed = $_POST['housed'];
    $borrow_title = $_POST['title'];
    $borrow_isbn = $_POST['movie_release'];
    $borrow_query = "INSERT INTO movieLoan
        (cardID,housed_in,movie_Title,movie_release) values
        ('$borrow_cardid', '$borrow_housed', '$borrow_title', '$borrow_isbn')";
    //$insert_result = insertintotable($borrow_query);
    insertintotable($borrow_query);

}

/*
 else {
    $query = "SELECT * FROM `movielist`";
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
         <h1>This is the Movie Search</h1>
        <form action="movies.php" method="post">
            <input type="text" name="valueToSearch" placeholder="Value To Search"><br><br>
            <input type="submit" name="search" value="Search"><br><br>
            
            <table>
                <tr>
                    <th>Title</th>
                    <th>Genre</th>
                    <th>Studio/th>
                    <th>Rating</th>
                    <th>Release Date</th>
                    <th>Housed In</th>
                </tr>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['title'];?></td>
                    <td><?php echo $row['genre'];?></td>
                    <td><?php echo $row['studio'];?></td>
                    <td><?php echo $row['rating'];?></td>
                    <td><?php echo $row['release_date'];?></td>
                    <td><?php echo $row['housed_in'];?></td>
                </tr>
                <?php endwhile;?>
            </table>
        </form>
<!-- new additions -->
        <br>
        <h2>Borrow a Movie</h2>
        <p>Insert all fields to checkout a book</p>

        <form action="movies.php" method="post">
              <label for="housed">Housed in:</label><br>
              <input type="text" id="housed" name="housed"><br>
              <label for="title">Title:</label><br>
              <input type="text" id="title" name="title"><br><br>
              <label for="movie_release">Movie Release:</label><br>
              <input type="text" id="movie_release" name="movie_release"><br>
              <input type="submit" name ="borrow" value="Submit">

              
            </form>
        
    </body>
</html>
