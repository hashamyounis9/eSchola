<?php
session_start();

$name = $_SESSION["name"];
echo "$name<br>";

echo "<h1>Welcome $name!</h1><br>";