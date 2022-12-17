<?php

$server = "localhost";
$username = "root";
$password = "";

// Create a database connection
$conn = mysqli_connect($server, $username, $password,'qutirmahal');

// Check for connection success
if(!$conn){
    die("connection to this database failed due to" . mysqli_connect_error());
}
// echo "Success connecting to the db";




?>