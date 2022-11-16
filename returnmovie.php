<?php
session_start();

    include("connection.php");
    include("functions.php");

    $user_data = check_login($con);


/*if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `booklist` WHERE CONCAT(`Auth_Fname`, `Auth_Lname`, `publisher`, `title`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}*/
if(isset($_POST['returnbook']))
{
    $borrow_cardid = $user_data['cardID'];
    $borrow_returnbook = $_POST['trans'];
    $borrow_title = $_POST['title'];
    $borrow_isbn = $_POST['isbn'];
    $borrow_query = "DELETE from movieLoan where `transactionNum` <= '$borrow_returnbook' and `transactionNum` >= '$borrow_returnbook'";
    deletefromtable($borrow_query);
    $test = $user_data['cardID'];
    $query = "SELECT * FROM movieLoan where `cardID` <= $test and `cardID` >= $test ";
    $search_result = filterTable($query);

}

 else {
    $test = $user_data['cardID'];
    $query = "SELECT * FROM movieLoan where `cardID` <= $test and `cardID` >= $test ";
    $search_result = filterTable($query);
}
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

function deletefromtable($query)
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
        <br>
     Hello, <?php echo $user_data['Fname']; ?> <?php echo $user_data[Lname]; ?>

     <br>
        <a href="index.php">Back to home</a><br><br>
         <h1>Movies currently checked out</h1>
       
            
            
            <table>
                <tr>
                    <th>Title</th>
                    <th>Due Date</th>
                    <th>Branch</th>
                    <th>Card ID</th>
                    <th>Release Date</th>
                    <th>Transaction Number</th>
                </tr>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['movie_Title'];?></td>
                    <td><?php echo $row['backBy'];?></td>
                    <td><?php echo $row['housed_in'];?></td>
                    <td><?php echo $row['cardID'];?></td>
                    <td><?php echo $row['movie_release'];?></td>
                    <td><?php echo $row['transactionNum'];?></td>
                </tr>
                <?php endwhile;?>
            </table>
      
<!-- new additions -->
        <br>
        <h2>Return a Book</h2>
        <p>Insert transaction number to return a movie</p>

        <form action="returnmovie.php" method="post">
            <label for="trans">Transaction Number:</label><br>
            <input type="text" id="trans" name="trans"><br>
            
            <input type="submit" name ="returnbook" value="Submit">

            
            </form>
        
    </body>
</html>
