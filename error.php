<style>
    body {
        background-color: #087cfc;
        color: white;
        font-family: sans-serif;
    }
</style>



<div style='display: flex; justify-content: center; align-items: center;'>
   <h1>Unexpected error...<br></h1>
</div>

<?php

session_start();





if (isset($_SESSION["error"])) {
    $error = $_SESSION["error"];
    echo "<div style='display: flex; justify-content: center; align-items: center;'>
    <h1>$error<br></h1>
    </div>";
}


if (isset($_SESSION["rows"])) {
    $rows = $_SESSION["row_count"];
    echo "<div style='display: flex; justify-content: center; align-items: center;'>
    <h1>$row<br></h1>
    </div>";
}



?>