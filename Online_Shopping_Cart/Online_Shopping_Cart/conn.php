<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "Online_Shopping_Cart_DB";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
