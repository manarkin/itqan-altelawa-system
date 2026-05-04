<?php include 'db.php'; ?> 
<!DOCTYPE html> 
<html lang='en'> 
<head> 
    <meta charset='UTF-8'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css' rel='stylesheet'> 
    <title>Search Rules</title> 
</head> 

<body class='bg-light p-4 text-center'> 
    
<h2>Search Club Rules</h2> 
<form method='GET' class='d-flex justify-content-center gap-2 mb-4'> 
<input type='text' name='search' class='form-control' style='max-width:400px' placeholder='Enter keyword...' value='
    <?php echo isset($_GET["search"]) ? htmlspecialchars($_GET["search"]) : ""; ?>
'>
 
<button type='submit' class='btn btn-info'>Search</button> 
<a href='search_rules.php' class='btn btn-outline-warning'>Clear</a> 
</form> 

<?php if (isset($_GET['search']) && $_GET['search'] !== '') { $search = $conn->real_escape_string($_GET['search']);
    $sql = "SELECT * FROM rules WHERE text LIKE '%$search%'"; 
    $result = $conn->query($sql); 
    echo '<h5>Results for: <em>' . htmlspecialchars($search) . '</em></h5>'; 
    if ($result->num_rows === 0) {
        echo '<p class="text-danger">No rules found.</p>'; 
        } 
        else { 
            echo '<table class="table table-bordered mx-auto" style="max-width:700px">'; 
            echo '<thead class="table-warning"><tr><th>#</th><th>Rule</th></tr></thead><tbody>'; 
            while ($row = $result->fetch_assoc()) {
                echo '<tr><td>' . $row['id'] . '</td><td>' . $row['text'] . '</td></tr>'; 
            } 
            echo '</tbody></table>'; 
        } 
    } else { 
        // Show ALL rules when no search term
        $result = $conn->query('SELECT * FROM rules'); 
        echo '<h5>All Club Rules</h5>'; 
        echo '<table class="table table-bordered mx-auto" style="max-width:700px">';
        echo '<thead class="table-warning"><tr><th>#</th><th>Rule</th></tr></thead><tbody>'; 
        while ($row = $result->fetch_assoc()) { 
            echo '<tr><td>' . $row['id'] . '</td><td>' . $row['text'] . '</td></tr>'; 
        } 
        echo '</tbody></table>'; 
    } 
?> 
<a href='index.html' class='btn btn-outline-warning mt-3'>Back to Home</a> 

</body>
</html>