<?php
$server="localhost";
$username="root";
$password="";
// $database_name= "qutirmahal"

$conn = mysqli_connect($server, $username, $password,'qutirmahal' );

if(!$conn)
{
    die("Connection Failed due to" . mysqli_connect_error());
}

//checking the connection
//echo "successfully connected the database!";

// sql to create table
$sql = "CREATE TABLE users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    users_email VARCHAR(50) NOT NULL UNIQUE,
    users_password VARCHAR(255) NOT NULL

);";

    if ($conn->query($sql) === TRUE) {
      echo "Users table Created successfully";
    } else {
      echo "Error creating table: " . $conn->error;
    }
    
    $conn->close();

?>