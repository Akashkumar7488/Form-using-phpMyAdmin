<?php
$conn = new mysqli('localhost', 'test', 'test12', 'form', 3307);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully!";
?>
