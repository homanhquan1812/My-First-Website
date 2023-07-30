<?php

$host = "localhost";
$user = "root";
$password = null;
$db = "onlinestore";

$connect = mysqli_connect($host,$user,$password,$db);

if($connect === false){
    die("ERROR: Could not connect." . mysqli_connect_error());
}
 
$sql1 = "CREATE TABLE products
(
    productID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    productName VARCHAR(30) NOT NULL,
    prices int
)";

$sql2 = "CREATE TABLE users
(
    username VARCHAR(30) NOT NULL,
    password VARCHAR(30) NOT NULL
)";

if(mysqli_query($connect, $sql1)){
    echo "Table Products created successfully.\n";
} else{
    echo "ERROR: Could not able to execute $sql1. " . mysqli_error($connect);
}
 
if(mysqli_query($connect, $sql2)){
    echo "Table Users created successfully.\n";
} else{
    echo "ERROR: Could not able to execute $sql2. " . mysqli_error($connect);
}

// Close connection
mysqli_close($connect);
?>