<?php
$conn = new mysqli("localhost", "root", "", "itqan_club");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>