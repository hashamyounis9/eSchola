<?php

$server_name = "localhost";
$username = "root";
$db_password = "";
$dbname = "test";

$connection = mysqli_connect($server_name, $username, $db_password);
mysqli_select_db($connection, $dbname);

function dbConnect(): bool
{   global $connection;
    if (! $connection) {
        return false;
    } else {
        return true;
    }
}