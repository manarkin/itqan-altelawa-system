<?php include 'db.php'; ?>

<form method="POST">
    <input type="number" name="id" placeholder="ID">
    <input type="text" name="text" placeholder="النص الجديد">
    <button type="submit">تحديث</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $text = $_POST['text'];

    $sql = "UPDATE rules SET text='$text' WHERE id=$id";
    $conn->query($sql);

    echo "تم التحديث";
}
?>