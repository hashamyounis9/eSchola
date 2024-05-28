<?php

function is_connected()
{
    $connected = @fsockopen("www.hashamyounas.me", 80);
    if ($connected) {
        fclose($connected);
        return true;
    } else {
        return false;
    }
}

if (is_connected()) {
    echo "Connected to the internet!";
} else {
    echo "No internet connection!";
}