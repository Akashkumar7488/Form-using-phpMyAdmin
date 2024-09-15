<?php
    include 'db_conn.php'; //database connection
    $sql = "SELECT * FROM form1";
    $result = $con->query($sql);
    if($result->num_rows > 0) {
echo '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Records</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<h1 class="text-white text-center p-2 bg-dark bg-gradient text-uppercase">Database Records</h1>
<div class="container mt-5">
    <table class="table table-responsive table-bordered border-dark table-hover  text-center cursor-pointer">
    <thead class="thead-dark"> 
        <tr class="table-dark ">
            <th>Id</th>
            <th>Fullname</th>
            <th>Email</th>
            <th>Password</th>
            <th>Mobile</th>
            <th>Salary</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>';
    while($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>" .$row['id'] ."</td>
            <td>" .$row['fullname'] ."</td>
            <td>" .$row['email'] ."</td>
            <td>" .$row['password'] ."</td>
            <td>" .$row['mobile'] ."</td>
            <td>" .$row['salary'] ."</td>
            <td>
            <button class='btn btn-primary'><a href='update.php?id=" .$row['id'] ."' class='text-light'>Edit</a></button>
            <button class='btn btn-danger'><a href='delete.php?id=" .$row['id'] ."' class='text-light' onclick='return confirm(\"you really want to delete this?\")'>Delete</a></button>
            </td>
            </tr>";
    }
    echo '</tbody>
</table>
</div>
</body>
</html>';
    }
    else {
        echo "<h3 class='text-center'>No records found </h3>";
    }
?>