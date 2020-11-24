<?php
    include('connect.php');
    if($_POST) {
        $img_id = $_POST['img_id'];
        $q = 'SELECT img_path FROM images WHERE img_id = ' . $img_id;
        $r = mysqli_query($conn, $q);
        $regex = "((https?|ftp)\:\/\/)?";
        $regex .= "([a-z0-9+!*(),;?&=\$_.-]+(\:[a-z0-9+!*(),;?&=\$_.-]+)?@)?";
        $regex .= "([a-z0-9-.]*)\.([a-z]{2,3})";
        $regex .= "(\:[0-9]{2,5})?";
        $regex .= "(\/([a-z0-9+\$_-]\.?)+)*\/?";
        $regex .= "(\?[a-z+&\$_.-][a-z0-9;:@&%=+\/\$_.-]*)?";
        $regex .= "(#[a-z_.-][a-z0-9+\$_.-]*)?";
        if($r){
            $data = mysqli_fetch_object($r);
            $img_path = $data->img_path;
            if(preg_match("/^$regex$/i", $img_path)) {
                $q1 = 'DELETE FROM images WHERE img_id = '.$img_id;
                $r1 = mysqli_query($conn, $q1);
                if($r1) {
                    header('location: ../photos.php?categ_id=' . $_POST['categ_id']);
                } else {
                    echo "MySQL Error: ".mysqli_error($conn);
                }
            } else {
                if(file_exists('../../'.$img_path)) {
                    if(!unlink('../../'.$img_path)) {
                        echo "Coukd not delete file";
                    } else {
                        $q1 = 'DELETE FROM images WHERE img_id = '.$img_id;
                        $r1 = mysqli_query($conn, $q1);
                        if($r1) {
                            header('location: ../photos.php?categ_id=' . $_POST['categ_id']);
                        } else {
                            echo "MySQL Error: ".mysqli_error($conn);
                        }
                    }
                } else {
                    echo "$img_path does not exist";
                }
            }
            
        } else {
            echo "MySQL Error: ".mysqli_error($conn);
        }
    }
?>