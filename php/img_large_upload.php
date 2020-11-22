<?php
    if($_FILES) {
        $file = $_FILES['file'];
        $fileName = $_POST['fileName'];
        if(move_uploaded_file($file['tmp_name'],'../../otherImages/'.$fileName)){
            exit("success|$fileName");
        } else {
            exit('error|error uploading file');
        }
    }
?>