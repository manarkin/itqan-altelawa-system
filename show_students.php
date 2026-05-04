<?php include 'db.php'; ?> 
<!DOCTYPE html> 
<html lang='en'> 
<head> 
<meta charset='UTF-8'>
<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css'
rel='stylesheet'> 
<title>Students List</title> 
</head> 

<body class='bg-light p-4'> 
    
<?php
// CLASS DEFINITION 
class Student { 
    private $id; 
    private $name; 
    private $email; 
    private $phone; 
    private $level; 

    // Constructor 
    public function __construct($id, $name, $email, $phone, $level) {
        $this->id = $id; 
        $this->name = $name; 
        $this->email = $email; 
        $this->phone = $phone;
        $this->level = $level; 
    } 
    
    // Getters 
    public function getId() { 
        return $this->id; 
    }
    public function getName() {
        return $this->name; 
    } 
    public function getEmail() { 
        return $this->email; 
    } 
    public function getPhone() {
        return $this->phone; 
    } 
    public function getLevel() {
        return $this->level; 
    } 
    
    // Setter example 
    public function setLevel($level) {
        $this->level = $level; 
    } 

    // Returns one HTML table row for this student public function
    toTableRow() { 
        return '<tr>' . '<td>' . $this->id . '</td>' . '<td>' . $this->name .
        '</td>' . '<td>' . $this->email . '</td>' . '<td>' . $this->phone . '</td>' . '<td>' .
        $this->level . '</td>' . '</tr>'; 
    } 
} 

// BUILD ARRAY OF OBJECTS from database 
$students = []; 
$result = $conn->query('SELECT * FROM students'); 
while ($row = $result->fetch_assoc()) { 
    $students[] = new Student( $row['id'], $row['name'],
    $row['email'], $row['phone'], $row['level'] ); 
} 

// FUNCTION to display the array as an HTML table 
function displayStudentsTable($studentsArray) { 
    if (empty($studentsArray)) { 
        echo '<p class="text-danger">No students found.</p>'; 
        return; 
    } 

    echo '<h2 class="text-center mb-4">All Students</h2>'; 
    echo '<table class="table table-bordered table-striped text-center">'; 
    echo '<thead class="table-warning">'; 
    echo '<tr><th>#</th><th>Name</th><th>Email</th><th>Phone</th><th>Level</th></tr>';
    echo '</thead><tbody>'; 
    foreach ($studentsArray as $student) { 
        echo $student->toTableRow(); 
    }

    echo '</tbody></table>'; 
} 

// Call the function 
displayStudentsTable($students); 

?> 

<div class='text-center mt-3'> 
<a href='index.html' class='btn btn-warning'>Back to Home</a>
</div> 

</body>
</html>