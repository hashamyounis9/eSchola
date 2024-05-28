<?php
session_start();
require "dbConnect.php";

$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];

if (!dbConnect()) {
    header("Location: error.php");
    exit();
} else {
    $query = "SELECT * FROM uesr WHERE email = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt,"s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) > 0) {
        echo "<p>User already exists...</p><br>";
    }  else {
        $query = "INSERT INTO uesr (name, email, password) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($stmt,"sss", $name, $email, $password);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $_SESSION["name"] = $name;
        $query = "SELECT * FROM uesr WHERE email = ?";
        $stmt = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($stmt,"s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        $_SESSION["id"] = $row["id"];
        header("Location: dashboard.php");
        exit();
    }
}