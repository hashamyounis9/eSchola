<?php
session_start();
require "dbConnect.php";

$email = $_POST["email"];
$password = $_POST["password"];




if (!dbConnect()) { // this function is from dbConnect.php
    $_SESSION["error"] = "Can't connect to database<br>";
    header("Location: error.html");
    exit();
} else {
    $query = "SELECT * FROM uesr WHERE email = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $_SESSION["row_count"] = mysqli_num_rows( $result );

    if ($row = mysqli_fetch_assoc($result)) {
        if ($password == $row['password']) {
            $_SESSION["name"] = $row['name'];
            header("Location: dashboard.html");
            exit();
        } else {
            $_SESSION["error"] = $row["Wrong Password"];
            header("Location: error.php");
            exit();
        }
    } else {
        $_SESSION["error"] = "User does not exist in database i.e. Username not found";
        header("Location: error.php");
    }
}

mysqli_stmt_close($stmt);
mysqli_close($connection);