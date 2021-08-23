<?php
    include('connect.php');
    $id = $_POST['resource_id'];
    $q = 'DELETE FROM resources WHERE id = '.$id;
    $r = mysqli_query($conn, $q);
    if($r) {
        header('location: ../resources.php');
    } else {
        echo "MySQL Error: ".mysqli_error($conn);
    }
?>