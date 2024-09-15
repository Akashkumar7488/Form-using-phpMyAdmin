<?php
include 'db_conn.php';  //database connection

if (isset($_POST['submit'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $mobile = $_POST['mobile'];
    $salary = $_POST['salary'];


    $stmt = $con->prepare("INSERT INTO form1 (fullname, email, password, mobile, salary) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssd", $fullname, $email, $password, $mobile, $salary);
    
    
    if ($stmt->execute()) {
        echo "<script>
                alert('Registration Successfully!!');
                window.location.href = 'login.html';
                </script>";
    }
    else {
        echo "Error:".$stmt->error;
    }
    $stmt->close();
    $con->close();
}
?>
