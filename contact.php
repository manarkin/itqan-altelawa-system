<?php
include 'db_connect.php'; // your connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $type = $_POST['type'];
    $message = $_POST['message'];
    $newsletter = isset($_POST['newsletter']) ? 1 : 0;

    $sql = "INSERT INTO feedback (name, email, phone, type, message, newsletter)
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $name, $email, $phone, $type, $message, $newsletter);
    $stmt->execute();

    echo "<h3>✓ شكراً لتواصلك معنا!</h3>";
}
?>
