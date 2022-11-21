<?php
$servername = "DESKTOP-83VHUOF";
$username = "php";
$password = "phpPassword1234!";
$database = "librarydb";


if(!$con = mysqli_connect($servername,$username,$password,$database))
{

	die("failed to connect#G##");
}


?>