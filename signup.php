<?php
session_start();
require "dbConnect.php";

$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];

if ($name == "" || !(filter_var($email, FILTER_VALIDATE_EMAIL)) || $password == "") {
    header("Location: error.php");
    exit();
}

function is_connected_to_internet()
{
    $connected = @fsockopen("www.hashamyounas.me", 80);
    if ($connected) {
        fclose($connected);
        return true;
    } else {
        return false;
    }
}

if (is_connected_to_internet()) {
    $ch = curl_init();

    $api_key = "52017c6806cc4f8db6504771399f3fa5";

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<h1>Format is valid, checking for amail authenticity...</h1><br>";
    } else {
        echo "Invalid format";
        exit();
    }
    curl_setopt($ch, CURLOPT_URL, "https://emailvalidation.abstractapi.com/v1/?api_key=$api_key&email=$email");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    $data = curl_exec($ch);

    curl_close($ch);
    if (json_decode($data, true)['deliverability'] === 'DELIVERABLE') {
        if (!dbConnect()) {
            header("Location: error.php");
            exit();
        } else {
            $query = "SELECT * FROM uesr WHERE email = ?";
            $stmt = mysqli_prepare($connection, $query);
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if (mysqli_num_rows($result) > 0) {
                echo "<p>User already exists...</p><br>";
            } else {
                $query = "INSERT INTO uesr (name, email, password) VALUES (?, ?, ?)";
                $stmt = mysqli_prepare($connection, $query);
                mysqli_stmt_bind_param($stmt, "sss", $name, $email, $password);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                $_SESSION["name"] = $name;
                $query = "SELECT * FROM uesr WHERE email = ?";
                $stmt = mysqli_prepare($connection, $query);
                mysqli_stmt_bind_param($stmt, "s", $email);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                $row = mysqli_fetch_assoc($result);
                $_SESSION["id"] = $row["id"];
                header("Location: dashboard.php");
                exit();
            }
        }
    } else {
        echo "<h1>Invalid Email Address!!</h1>";
    }
} else {
    if (!dbConnect()) {
        header("Location: error.php");
        exit();
    } else {
        $query = "SELECT * FROM uesr WHERE email = ?";
        $stmt = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if (mysqli_num_rows($result) > 0) {
            echo "<p>User already exists...</p><br>";
        } else {
            $query = "INSERT INTO uesr (name, email, password) VALUES (?, ?, ?)";
            $stmt = mysqli_prepare($connection, $query);
            mysqli_stmt_bind_param($stmt, "sss", $name, $email, $password);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $_SESSION["name"] = $name;
            $query = "SELECT * FROM uesr WHERE email = ?";
            $stmt = mysqli_prepare($connection, $query);
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $row = mysqli_fetch_assoc($result);
            $_SESSION["id"] = $row["id"];
            header("Location: dashboard.php");
            exit();
        }
    }
}