<?php

include "db_conn.php";


if(isset($_GET['id'])) {
    $id=$_GET['id'];

    $delete=mysqli_query($con, "DELETE FROM `form1` WHERE `id`='$id'");
    if ($delete) {
        echo 
        "<script>
            alert('Record deleted successfully!!');
            window.location.href = 'table.php';
        </script>";
    } else {
        echo "Error deleting record: " .mysqli_error($con);
    }
}
?>