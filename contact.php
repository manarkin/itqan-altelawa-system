<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Message Sent</title>
</head>
<body class="bg-light text-center p-5">
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name    = $conn->real_escape_string($_POST['name']);
  $email   = $conn->real_escape_string($_POST['email']);
  $phone   = $conn->real_escape_string($_POST['phone']);
  $type    = $conn->real_escape_string($_POST['type']);
  $message = $conn->real_escape_string($_POST['message']);

  $conn->query("INSERT INTO contacts (name,email,phone,type,message)
                VALUES ('$name','$email','$phone','$type','$message')");

  echo "<h2 class='text-success mt-5'>✓ Message sent!</h2>";
  echo "<table class='table table-bordered mx-auto mt-4' style='max-width:600px'>";
  echo "<tr><th>Name</th><td>$name</td></tr>";
  echo "<tr><th>Email</th><td>$email</td></tr>";
  echo "<tr><th>Phone</th><td>$phone</td></tr>";
  echo "<tr><th>Type</th><td>$type</td></tr>";
  echo "<tr><th>Message</th><td>$message</td></tr>";
  echo "</table>";
  echo "<a href='index.html' class='btn btn-warning mt-3'>Back to Home</a>";
}
?>
</body>
</html>