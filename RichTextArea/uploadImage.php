<?php
    if($_FILES) {
        $file = $_FILES['image'];
        $fileExt = pathinfo($file['name'], PATHINFO_EXTENSION);
        $newFileName = mt_rand().'.'.$fileExt;
        if(move_uploaded_file($file['tmp_name'], '../../otherImages/'.$newFileName)) {
            $baseurl = 'http://192.168.64.2/';
            echo $baseurl.'otherImages/'.$newFileName;
        } else {
            echo "error uploading file";
        }
    }
?>