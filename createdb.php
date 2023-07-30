<?php

$host = "localhost";
$user = "root";
$password = null;

$connect = new mysqli($host,$user,$password);

$command = "Create database OnlineStore";

$result = $connect->query($command);

if($result = true)
{
    echo "Database created.";
}
else
{
    echo die(mysqli_error($connect));
}

?>