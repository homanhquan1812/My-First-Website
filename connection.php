<?php 
$host = "localhost";
$username = "root";
$password = null;
$dbname = "onlinestore";
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$start = 0;
$rows_per_page = 4;

// Retrieve data from the "products" table
$sql = "SELECT productID, productName, prices, productImage FROM products";
$records = mysqli_query($conn, $sql);

$nr_of_rows = mysqli_num_rows($records);

$pages = ceil($nr_of_rows / $rows_per_page);

if(isset($_GET['pagination'])){
    $page = $_GET['pagination'] - 1;
    $start = $page * $rows_per_page;
 }

$sql1 = "SELECT productID, productName, prices, productImage FROM products LIMIT $start, $rows_per_page";
$result = mysqli_query($conn, $sql1);

?>