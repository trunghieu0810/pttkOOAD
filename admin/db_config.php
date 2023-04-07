<?php

header("Content-type: text/html; charset=utf-8");
$servername = "localhost";
$username = "root";
$password = "";
$database = "moviebooking";

// Create connection
$db = mysqli_connect($servername, $username, $password, $database);
mysqli_set_charset($db, 'UTF8');

// Check connection
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

?>