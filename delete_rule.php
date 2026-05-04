<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Delete Rule</title>
</head>
<body class="bg-light p-5 text-center">
  <div class="card p-4 mx-auto shadow" style="max-width:400px">
    <h3 class="text-danger">Delete a Rule</h3>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $id = intval($_POST['id']);
      if ($id > 0) {
        $conn->query("DELETE FROM rules WHERE id=$id");
        echo '<div class="alert alert-success">Rule deleted.</div>';
      }
    }
    ?>
    <form method="POST">
      <div class="mb-3 text-start">
        <label class="form-label">Rule ID to delete</label>
        <input type="number" name="id" class="form-control" min="1" required>
      </div>
      <button type="submit" class="btn btn-danger w-100">Delete</button>
    </form>
    <a href="search_rules.php" class="btn btn-outline-warning mt-3">View All Rules</a>
  </div>
</body>
</html>