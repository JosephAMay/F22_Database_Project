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
    <label> Insert or Delete: </label>
        <select name = "IorD">
            <option value="insert"> INSERT </option>
            <option value="delete"> DELETE </option>
        <br>
        </select>
    <label> Table: </label>
        <select name = "table">
            <option value="bookList"> BOOKLIST </option>
            <option value="audioList"> AUDIOLIST </option>
            <option value="movieList"> MOVIELIST </option>
            <option value="bookLoan"> BOOKLOAN </option>
            <option value="audioLoan"> AUDIOLOAN </option>
            <option value="movieLoan"> MOVIELOAN </option>
            <option value="library"> LIBRARY </option>
            <option value="employee"> EMPLOYEE </option>
            <option value="cardholder"> CARDHOLDER </option>
            <br>
            </select>
        <br>
        <input type="submit" name="search" value="Select Table"/> <br>
        <br> <br> <br> <br> <br>


        <input type="submit" name="back" value="Go Back"/> <br>
</body>
</html>

<?php


        if(isset($_POST['search'])){
            $IorD = $_POST['IorD'];
            $table = $_POST['table'];
            if($table == 'bookList'){
                if($IorD == 'insert'){
                    header("Location: bookListI.php");
                    die;
                }
                if($IorD == 'delete'){
                    header("Location: bookListD.php");
                    die;
                }
                
            }
            if($table == 'audioList'){
                if($IorD == 'insert'){
                    header("Location: audioListI.php");
                    die;
                }
                if($IorD == 'delete'){
                    header("Location: audioListD.php");
                    die;
                }
                
            }
            if($table == 'movieList'){
                if($IorD == 'insert'){
                    header("Location: movieListI.php");
                    die;
                }
                if($IorD == 'delete'){
                    header("Location: movieListD.php");
                    die;
                }
            }
            if($table == 'bookLoan'){
                if($IorD == 'insert'){
                    header("Location: bookLoanI.php");
                    die;
                }
                if($IorD == 'delete'){
                    header("Location: bookLoanD.php");
                    die;
                }
                
            }
            if($table == 'audioLoan'){
                if($IorD == 'insert'){
                    header("Location: audioLoanI.php");
                    die;
                }
                if($IorD == 'delete'){
                    header("Location: audioLoanD.php");
                    die;
                }
                
            }
            if($table == 'movieLoan'){
                if($IorD == 'insert'){
                    header("Location: movieLoanI.php");
                    die;
                }
                if($IorD == 'delete'){
                    header("Location: movieLoanD.php");
                    die;
                }
            }
            if($table == 'library'){
                if($IorD == 'insert'){
                    header("Location: libraryI.php");
                    die;
                }
                if($IorD == 'delete'){
                    header("Location: libraryD.php");
                    die;
                }
                
            }
            if($table == 'employee'){
                if($IorD == 'insert'){
                    header("Location: employeeI.php");
                    die;
                }
                if($IorD == 'delete'){
                    header("Location: employeeD.php");
                    die;
                }
                
            }
            if($table == 'cardholder'){
                if($IorD == 'insert'){
                    header("Location: cardholderI.php");
                    die;
                }
                if($IorD == 'delete'){
                    header("Location: cardholderD.php");
                    die;
                }
            }
        }
        if(isset($_POST['back'])){
            header("Location: employeeMenu.php");
            die;
        }
        
	 ?>