<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "pakar";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die($conn->connect_error);
}
$basepath = dirname($_SERVER['PHP_SELF']);
session_start();
// error_reporting(0);
?>