<?php
//this holds the database login password
$host= getenv("host");
$database= getenv("database");
$user = getenv ("username");
$password = getenv("password");
$connection = mysqli_connect($host,$user,$password,$database);

?>