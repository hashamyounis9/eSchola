<?php

session_start();

if (isset($_SESSION["error"])) {
    $error = $_SESSION["error"];
    echo "$error<br>";
}


if (isset($_SESSION["rows"])) {
    $rows = $_SESSION["row_count"];
    echo "$rows<br>";
}