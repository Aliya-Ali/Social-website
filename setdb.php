<?php

$host = "localhost";
$username = "root";
$password = "";  
$db = "Codebook_db";


$connection = mysqli_connect($host, $username, $password, $db );
$first_name = "earthorne";
$last_name  = "chongo";

$query = "insert into user (first_name, last_name) values ('$first_name', '$last_name')";

echo $query; 


mysqli_query($connection, $query);

echo mysqli_error($connection);
