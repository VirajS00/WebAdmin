<?php
	include('resizeImage.php');
    include('connect.php');
    if($_POST) {
        if(isset($_FILES)){
            $caption = addslashes($_POST['caption']);
            $file = $_FILES['photo'];
            $fileTmpLoc = $file['tmp_name'];
            $catId = $_POST['category_id'];
            $status = $res = new \stdClass();
            $catName;
            $errors = [];
            if($catId == '0') {
                $errors[] = "Error: Please select category";
            } else {
                $catName = $_POST['category_name'];
            }

            if (!$fileTmpLoc) { 
                $errors[] = "Error: Please browse for a file before clicking the upload button.";
            }
            
            if(empty($caption)){
                $errors[] = "Error: Please enter caption";
            }

            if(empty($errors)) {
                $images = resizeImageToWidthJPGPNG(800, $file, '../pics/');
                if (!$images) {
                    $status->status = 'error';
                    $status->error = 'error uploading image';
                    exit();
                } else {
                    $q = 'INSERT INTO images (img_id, img_path, categ_id, category, caption, url_small, sort)
                    VALUES (NULL, "'.$images.'", '.$catId.', "'.$catName.'", "'.$caption.'", "'.$images.'", 0)';
                    $r = mysqli_query($conn, $q);
                    if($r) {
                        $status->status = 'sucess';
                        exit(json_encode($status));
                    } else {
                        $status->status = 'error';
                        $e = 'MySQL Error: '.mysqli_error($conn);
                        $status->error = [$e];
                        exit(json_encode($status));
                    }
                }
            } else {
                $status->status = 'error';
                $status->error = $errors;
                exit(json_encode($status));
            }
        }
    }
?>
