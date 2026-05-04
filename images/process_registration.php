<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "itqan_club"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Class Definition
class Registration {
    public $reg_id;
    public $first_name;
    public $father_name;
    public $last_name;
    public $email;
    public $role;
    public $college;
    public $cohort;

    public function __construct($id, $first, $father, $last, $email, $role, $college, $cohort) {
        $this->reg_id = $id;
        $this->first_name = $first;
        $this->father_name = $father;
        $this->last_name = $last;
        $this->email = $email;
        $this->role = $role;
        $this->college = $college;
        $this->cohort = $cohort;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $first = $_POST['first_name'];
    $father = $_POST['father_name'];
    $last = $_POST['last_name'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $college = $_POST['college'];
    $cohort = $_POST['cohort'];

    $sql = "INSERT INTO registrations (first_name, father_name, last_name, email, password, role, college, batch_group) 
            VALUES ('$first', '$father', '$last', '$email', '$pass', '$role', '$college', '$group')";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>تم التسجيل بنجاح!</div>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$registrationsList = [];
$result = $conn->query("SELECT * FROM registrations");

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $registrationsList[] = new Registration(
            $row["reg_id"], 
            $row["first_name"], 
            $row["father_name"], 
            $row["last_name"], 
            $row["email"], 
            $row["role"], 
            $row["college"], 
            $row["batch_group"]
        );
    }
}


function displayRegistrations($list) {
    echo "<table border='1' class='table table-striped'>";
    echo "<thead><tr><th>ID</th><th>الاسم</th><th>الايميل</th><th>الرتبة</th><th>الكلية</th><th>الدفعة</th></tr></thead>";
    echo "<tbody>";
    foreach ($list as $reg) {
        echo "<tr>
                <td>{$reg->reg_id}</td>
                <td>{$reg->first_name} {$reg->last_name}</td>
                <td>{$reg->email}</td>
                <td>{$reg->role}</td>
                <td>{$reg->college}</td>
                <td>{$reg->batch_group}</td>
              </tr>";
    }
    echo "</tbody></table>";
}

?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>بيانات المسجلين</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h2 class="text-center mb-4">قائمة المسجلين في نادي إتقان</h2>
    <?php displayRegistrations($registrationsList); ?>
    <br>
    <a href="index.html" class="btn btn-warning">العودة للرئيسية</a>
</body>
</html>
<?php $conn->close(); ?>