<?php

$dbhost = "localhost:8889";
$dbuser = "root";
$dbpass = "root";
$dbname = "libraryDB2";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect#G##");
}
