<?php
include 'db_conn.php';

$id = $_GET['id'];
$sql = "SELECT * FROM form1 WHERE id = $id";
$result = $con->query($sql);
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $mobile = $_POST['mobile'];
    $salary = $_POST['salary'];

    $update_sql = "UPDATE form1 SET fullname='$fullname', email='$email', password='$password', mobile='$mobile', salary='$salary' WHERE id=$id";
    
    if ($con->query($update_sql) === TRUE) {
        echo "<script>
                alert('Record Updated Successfully!!');
                window.location.href = 'table.php';
                </script>";
        exit();
    } else {
        echo "Error updating record: " . $con->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="form">
        <h1>Update Form</h1>
        <form  method="post">
            <div id="name" class="form-group">
                <p>Full Name:</p>
                <input type="text" id="fullname" class="form-control" name="fullname" value="<?php echo $row['fullname']; ?>"> 
            </div> 
            <div id="email" class="form-group"> 
                <p>Email:</p>
                <input type="email" id="email" class="form-control" name="email" value="<?php echo $row['email']; ?>"> 
            </div>
            <div id="password" class="form-group">
                <p>Password:</p>
                <input type="password" id="password" class="form-control" name="password" value="<?php echo $row['password']; ?>"> 
            </div>
            <div id="mobile" class="form-group">
                <p>Mobile No:</p>
                <input type="number" id="mobile" class="form-control" name="mobile" value="<?php echo $row['mobile']; ?>"> 
            </div>
            <div id="salary" class="form-group">
                <p>Salary:</p>
                <input type="number" id="salary" class="form-control" name="salary" value="<?php echo $row['salary']; ?>"> 
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>