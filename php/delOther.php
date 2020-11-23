<?php
    include('connect.php');
    $id = $_POST['other_id'];
    $q = 'SELECT img_small, img_large FROM other WHERE id = ' . $id;
    $r = mysqli_query($conn, $q);
    if($r) {
        $data = mysqli_fetch_object($r);
        $img_small = $data->img_small;
        $img_large = $data->img_large;
        if(!unlink('../../'.$img_small) && !unlink('../../'.$img_large)) {
            echo "could not delete files";
        } else {
            $q1 = "DELETE FROM other WHERE id = $id";
            $r1 = mysqli_query($conn, $q1);
            if($r1) {
                header('location: ../other.php');
            } else {
                echo "Mysql Error: " . mysqli_error($conn);
            }
        }
    } else {
        echo "Mysql Error: " . mysqli_error($conn);
    }
?>
