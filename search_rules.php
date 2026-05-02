<?php include 'db.php'; ?>

<form method="GET">
    <input type="text" name="search" placeholder="ابحث عن شرط">
    <button type="submit">بحث</button>
</form>

<?php
if (isset($_GET['search'])) {
    $search = $_GET['search'];

    $sql = "SELECT * FROM rules WHERE text LIKE '%$search%'";
    $result = $conn->query($sql);

    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>الشرط</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['text']."</td>";
        echo "</tr>";
    }

    echo "</table>";
}
?>