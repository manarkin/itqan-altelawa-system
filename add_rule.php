<?php include 'db.php'; ?>

<form method="POST">
    <input type="text" name="rule" placeholder="أدخل الشرط">
    <button type="submit">إضافة</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rule = $_POST['rule'];

    $sql = "INSERT INTO rules (text) VALUES ('$rule')";
    $conn->query($sql);

    echo "تمت الإضافة بنجاح";
}
?>