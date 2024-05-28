<?php

require "dbConnect.php";

$insert_query = "INSERT INTO uesr (email, password) VALUES ('hashamyounis9@gmail.com', '77547754')";

$select_query = "SELECT * FROM uesr WHERE id = 10";

if (!$connection) {
    header("Location: error.html");
    exit();
} else {
    echo "Connected to database!<br>";
    $result = mysqli_query($connection, $insert_query);
    echo "Data inserted to database...<br>";
    // if (mysqli_num_rows($result) > 0) {
    //     echo "Login Success!<br>";
    // } else {
    //     echo "Invalide email or password<br>";
    // }
}

echo "Inside the code<br>";
