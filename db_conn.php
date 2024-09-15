<?php
$host = "localhost";
$username = "test";
$password = "test12";
$dbname = "form";
$port = 3307;

$con = new mysqli("localhost", "test", "test12", "form", 3307);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
?>
