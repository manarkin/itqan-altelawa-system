<?php include 'db.php'; ?> 
<!DOCTYPE html> 
<html lang='en'> 
<head> 
    <meta charset='UTF-8'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css' rel='stylesheet'>
    <title>Add Rule</title> 
</head> 

<body class='bg-light p-5 text-center'>

<div class='card p-4 mx-auto shadow' style='max-width:500px'> 
<h3>Add New Rule</h3> 
<?php if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
    $rule = $conn->real_escape_string($_POST['rule']); 
    if ($rule !== '') { 
        $conn->query("INSERT INTO rules (text) VALUES ('$rule')"); 
        echo '<div class="alert alert-success">Rule added successfully!</div>'; 
    } else { 
        echo '<div class="alert alert-danger">Please enter a rule.</div>'; 
    } 
} ?> 

<form method='POST'> 
    
    <div class='mb-3 text-start'>
        <label class='form-label'>Rule Text</label> 
        <textarea name='rule' class='form-control' rows='3' placeholder='Enter the rule...' required> </textarea> 
    </div> 
    <button type='submit' class='btn btn-info w-100'>Add Rule</button> 
</form> 

<a href='search_rules.php' class='btn btn-outline-warning mt-3'>View All Rules</a> 
</div> 

</body>
</html>