<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Registration</title>
</head>
<body class="bg-light text-center p-5">
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name  = $conn->real_escape_string($_POST['firstName'].' '.$_POST['lastName']);
  $email = $conn->real_escape_string($_POST['email']);
  $phone = $conn->real_escape_string($_POST['phone']);
  $level = $conn->real_escape_string($_POST['level']);

  $conn->query("INSERT INTO students (name,email,phone,level)
                VALUES ('$name','$email','$phone','$level')");

  echo "<h2 class='text-success mt-5'>✓ Registration successful!</h2>";
  echo "<table class='table table-bordered mx-auto mt-4' style='max-width:500px'>";
  echo "<tr><th>Name</th><td>$name</td></tr>";
  echo "<tr><th>Email</th><td>$email</td></tr>";
  echo "<tr><th>Phone</th><td>$phone</td></tr>";
  echo "<tr><th>Level</th><td>$level</td></tr>";
  echo "</table>";
  echo "<a href='index.html' class='btn btn-warning mt-3'>Back to Home</a>";
}
?>
</body>
</html>