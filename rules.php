<?php include 'db.php'; ?>

<?php
$message = "";

/* HANDLE ACTIONS */
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // ADD
    if (isset($_POST["action"]) && $_POST["action"] == "add") {
        $text = $conn->real_escape_string(trim($_POST["text"]));
        if ($text != "") {
            $conn->query("INSERT INTO rules (text) VALUES ('$text')");
            $message = '<div class="alert alert-success text-end">✅ تمت إضافة الشرط</div>';
        }
    }

    // UPDATE
    if (isset($_POST["action"]) && $_POST["action"] == "update") {
        $id   = intval($_POST["id"]);
        $text = $conn->real_escape_string(trim($_POST["text"]));

        if ($id > 0 && $text != "") {
            $conn->query("UPDATE rules SET text='$text' WHERE id=$id");
            $message = '<div class="alert alert-info text-end">✏️ تم تعديل الشرط</div>';
        }
    }

    // DELETE
    if (isset($_POST["action"]) && $_POST["action"] == "delete") {
        $id = intval($_POST["id"]);

        if ($id > 0) {
            $conn->query("DELETE FROM rules WHERE id=$id");
            $message = '<div class="alert alert-warning text-end">🗑️ تم حذف الشرط</div>';
        }
    }
}

/* SEARCH */
$search = "";
if (isset($_GET["search"]) && $_GET["search"] != "") {
    $search = $conn->real_escape_string($_GET["search"]);
    $sql = "SELECT * FROM rules WHERE text LIKE '%$search%'";
} else {
    $sql = "SELECT * FROM rules";
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

<title>شروط التسجيل</title>
</head>

<body class="bg-light text-center">

<!-- HEADER -->
<header class="bg-white">
<nav class="navbar d-flex justify-content-between">
<a class="navbar-brand d-flex align-items-center" href="index.html">
<img src="images/logo.png" width="40" class="ms-2">
<span class="fw-bold">نادي إتقان التلاوة</span>
</a>
</nav>
<hr class="border border-warning border-2 opacity-75">
</header>

<!-- TITLE -->
<section class="container my-4">
<h1 class="text-dark">شروط التسجيل</h1>
<p class="text-info">يرجى قراءة الشروط قبل التسجيل</p>
</section>

<!-- MESSAGE -->
<div class="container">
<?php echo $message; ?>
</div>

<!-- ADD + SEARCH -->
<section class="container mb-4">
<div class="card p-3">

<div class="row g-2 align-items-center">

<!-- ADD -->
<div class="col-lg-5">
<form method="POST" action="rules.php" class="d-flex gap-2">
<input type="hidden" name="action" value="add">
<input type="text" name="text" class="form-control text-end" placeholder="أدخل الشرط" required>
<button type="submit" class="btn btn-info">إضافة</button>
</form>
</div>

<!-- SEARCH -->
<div class="col-lg-4 offset-lg-3">
<form method="GET" action="rules.php" class="d-flex gap-2">
<input type="text" name="search" class="form-control text-end"
placeholder="بحث..." value="<?php echo htmlspecialchars($search); ?>">
<button type="submit" class="btn btn-outline-warning">بحث</button>

<?php if ($search): ?>
<a href="rules.php" class="btn btn-outline-secondary">مسح</a>
<?php endif; ?>

</form>
</div>

</div>

</div>
</section>

<!-- TABLE -->
<section class="container mb-5">

<table class="table text-center">

<thead class="table-light">
<tr>
<th>#</th>
<th>الشرط</th>
<th>تعديل</th>
<th>حذف</th>
</tr>
</thead>

<tbody>

<?php if ($result && $result->num_rows > 0): ?>
<?php while($row = $result->fetch_assoc()): ?>

<tr>

<td><?php echo $row["id"]; ?></td>

<!-- TEXT -->
<td class="text-end">

<form method="POST" action="rules.php" class="d-inline">

<input type="hidden" name="action" value="update">
<input type="hidden" name="id" value="<?php echo $row["id"]; ?>">

<span id="text-<?php echo $row["id"]; ?>">
<?php echo htmlspecialchars($row["text"]); ?>
</span>

<input id="input-<?php echo $row["id"]; ?>"
name="text"
type="text"
class="form-control d-none text-end"
value="<?php echo htmlspecialchars($row["text"]); ?>">

</td>

<!-- EDIT -->
<td>

<button type="button"
class="btn btn-sm btn-outline-info"
id="edit-btn-<?php echo $row['id']; ?>"
onclick="startEdit(<?php echo $row['id']; ?>)">
✏️ تعديل
</button>

<button type="submit"
class="btn btn-success btn-sm d-none"
id="save-btn-<?php echo $row['id']; ?>">
💾 حفظ
</button>

<button type="button"
class="btn btn-secondary btn-sm d-none"
id="cancel-btn-<?php echo $row['id']; ?>"
onclick="cancelEdit(<?php echo $row['id']; ?>)">
إلغاء
</button>

</form>

</td>

<!-- DELETE -->
<td>

<form method="POST" action="rules.php"
onsubmit="return confirm('هل أنت متأكد من الحذف؟')">

<input type="hidden" name="action" value="delete">
<input type="hidden" name="id" value="<?php echo $row["id"]; ?>">

<button type="submit" class="btn btn-sm btn-outline-danger">
🗑️ حذف
</button>

</form>

</td>

</tr>

<?php endwhile; ?>

<?php else: ?>
<tr>
<td colspan="4" class="text-danger">
<?php echo $search ? "لا توجد نتائج" : "لا توجد شروط مضافة"; ?>
</td>
</tr>
<?php endif; ?>

</tbody>
</table>

</section>

<!-- JS -->
<script>
function startEdit(id) {
    document.getElementById("text-" + id).classList.add("d-none");
    document.getElementById("input-" + id).classList.remove("d-none");

    document.getElementById("edit-btn-" + id).classList.add("d-none");
    document.getElementById("save-btn-" + id).classList.remove("d-none");
    document.getElementById("cancel-btn-" + id).classList.remove("d-none");
}

function cancelEdit(id) {
    document.getElementById("text-" + id).classList.remove("d-none");
    document.getElementById("input-" + id).classList.add("d-none");

    document.getElementById("edit-btn-" + id).classList.remove("d-none");
    document.getElementById("save-btn-" + id).classList.add("d-none");
    document.getElementById("cancel-btn-" + id).classList.add("d-none");
}
</script>

<!-- FOOTER -->
<footer class="mt-5 bg-white">
<hr class="border border-warning border-2 opacity-75 mx-auto">

<div class="container pb-4">
<p>© 2026 نادي إتقان التلاوة</p>

<div class="d-flex justify-content-center gap-4">
<a href="contact.html" class="text-decoration-none text-secondary">اتصل بنا</a>
<a href="rules.php" class="text-decoration-none text-secondary">الشروط</a>
</div>
</div>

</footer>

</body>
</html>