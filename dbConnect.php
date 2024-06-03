<?php
// db_connect.php
require 'load_env.php';

// Fetch environment variables
$server_name = $_ENV['DB_HOST'];
$username = $_ENV['DB_USER'];
$db_password = $_ENV['DB_PASS'];
$dbname = $_ENV['DB_NAME'];

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