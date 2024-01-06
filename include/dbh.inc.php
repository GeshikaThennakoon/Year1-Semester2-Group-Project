<?php

$severName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "recruitme";

$con = mysqli_connect($severName,$dbUsername,$dbPassword,$dbName);

if(!$con)
{
    die("connection Failed :".mysqli_connect_error());
}

?>