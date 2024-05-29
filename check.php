<?php
require "dbConnect.php";

if (!dbConnect()) {
    echo "Can't connect";
} else{
    echo "Connected!";
}