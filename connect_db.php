<?php

$host = "localhost";
$username = "root";
$password = "";  
$db = "Codebook_db";


$connection = mysqli_connect($host, $username, $password, $db );
$first_name = "earthorne";
$last_name  = "chongo";

$query = "select * from user";


$result = mysqli_query($connection, $query);
print_r($result);

echo "<pre>";
print_r($result);
echo "</pre>";

// while ($row = mysqli_fetch_array($result))
// {
//     echo "<pre>";
//     print_r($row);
//     echo "</pre>";
// }
while ($row = mysqli_fetch_assoc($result))
{
    echo "<pre>";
    print_r($row);
    echo "</pre>";
}

