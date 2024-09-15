<?php
include 'db_conn.php'; //database connection

$email = $_POST['email'];
$password = $_POST['password'];

    $stmt = $con->prepare("SELECT * from form1 WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt_result = $stmt->get_result();

    if($stmt_result->num_rows > 0) {
      $data = $stmt_result->fetch_assoc();

      if(password_verify($password, $data['password'])){  //password_verify compare plain $password with stored hashed password $data['password']
        echo "<script>
                alert('Login Successfully!!');
                window.location.href = 'table.php';
                </script>";
      }
      else {
        echo "<h2>Invalid Email or Password</h2>";
      }
    }
    else {
        echo "<h2>Invalid Email or Password</h2>";
    }

?>
