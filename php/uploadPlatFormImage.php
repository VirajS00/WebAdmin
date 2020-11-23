<?php
    include('resizeImage.php');
    if ($_FILES) {
        $file = $_FILES['file'];
        $uploaded = resizeImageToWidthJPGPNG(250, $file, '../../otherImages/platforms/');
        if(!$uploaded) {
            echo "error|Error uploading file";
        } else {
            echo "success|$uploaded";
        }
    }
?>