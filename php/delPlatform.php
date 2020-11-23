<?php
    include('connect.php');
    $id = $_POST['platform_id'];
    $src = $_POST['platform_img_src'];
    if(!unlink('../../'.$src)) {
        echo "Could not delete image";
    } else {
        $q = 'DELETE FROM platforms WHERE id = '.$id;
        $r = mysqli_query($conn, $q);
        if($r) {
            header('location: ../platforms.php');
        } else {
            echo "MySQL Error: ".mysqli_error($conn);
        }
    }
?>