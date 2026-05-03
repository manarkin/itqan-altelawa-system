<?php include 'db.php'; ?> 
<!DOCTYPE html> 
<html lang='en'> 
    
<head> 
<meta charset='UTF-8'>
<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css'rel='stylesheet'> 
<title>Update Rule</title> 
</head> 

<body class='bg-light p-5 text-center'> 
<div class='card p-4 mx-auto shadow' style='max-width:500px'> 
<h3>Update a Rule</h3> 
<?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = intval($_POST['id']);
    $text = $conn->real_escape_string($_POST['text']); 
    if ($id > 0 && $text !== '') {
        $conn->query("UPDATE rules SET text='$text' WHERE id=$id"); 
        echo '<div class="alert alert-success">Rule updated!</div>'; 
    } else {
    echo '<div class="alert alert-danger">Please fill in all fields.</div>'; 
    } 
} ?> 

<form method='POST'> 
    <div class='mb-3 text-start'> 
        <label class='form-label'>Rule ID (number)</label> 
        <input type='number' name='id' class='form-control' min='1' required> </div> 
    <div class='mb-3 text-start'> 
        <label class='form-label'>New Rule Text</label> 
        <textarea name='text' class='form-control' rows='3' required></textarea> 
    </div> 
    <button type='submit' class='btn btn-warning w-100'>Update Rule</button> 
</form> 

<a href='search_rules.php' class='btn btn-outline-info mt-3'>View All Rules</a> 
</div> 

</body>
</html>