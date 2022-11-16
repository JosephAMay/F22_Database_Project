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
    $query = "SELECT * FROM `booklist` WHERE CONCAT(`Auth_Fname`, `Auth_Lname`, `publisher`, `title`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
if(isset($_POST['borrow']))
{
	$borrow_cardid = $user_data['cardID'];
	$borrow_housed = $_POST['housed'];
	$borrow_title = $_POST['title'];
	$borrow_isbn = $_POST['isbn'];
	$borrow_query = "INSERT INTO bookLoan
		(cardID,housed_in,bookTitle,ISBN) values
		('$borrow_cardid', '$borrow_housed', '$borrow_title', '$borrow_isbn')";
	//$insert_result = insertintotable($borrow_query);
	insertintotable($borrow_query);

}
/*
 else {
    $query = "SELECT * FROM `booklist`";
    $search_result = filterTable($query);
} */
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
    	<br>
	 Hello, <?php echo $user_data['Fname']; ?> <?php echo $user_data[Lname]; ?>

	 <br>
        <a href="index.php">Back to home</a><br><br>
         <h1>This is the Book Search</h1>
        <form action="books.php" method="post">
            <input type="text" name="valueToSearch" placeholder="Value To Search"><br><br>
            <input type="submit" name="search" value="Search"><br><br>
            
            <table>
                <tr>
                    <th>Author last name</th>
                    <th>Author first name</th>
                    <th>Publisher</th>
                    <th>Title</th>
                    <th>ISBN</th>
                    <th>Housed In</th>
                    
                </tr>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['Auth_Fname'];?></td>
                    <td><?php echo $row['Auth_Lname'];?></td>
                    <td><?php echo $row['publisher'];?></td>
                    <td><?php echo $row['title'];?></td>
                    <td><?php echo $row['ISBN'];?></td>
                    <td><?php echo $row['housed_in'];?></td>
                    
                </tr>
                <?php endwhile;?>
            </table>
        </form>
<!-- new additions -->
		<br>
		<h2>Borrow a Book</h2>
		<p>Insert all fields to checkout a book</p>

		<form action="books.php" method="post">
  			<label for="housed">Housed in:</label><br>
  			<input type="text" id="housed" name="housed"><br>
  			<label for="title">Title:</label><br>
  			<input type="text" id="title" name="title"><br><br>
  			<label for="isbn">ISBN:</label><br>
  			<input type="text" id="isbn" name="isbn"><br>
  			<input type="submit" name ="borrow" value="Submit">

  			
			</form>
        
    </body>
</html>

