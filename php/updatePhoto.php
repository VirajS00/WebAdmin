<?php
    include('connect.php');
    $img_id = $_POST['img_id'];
    $categ_id = $_POST['categ_id'];
    $caption = addslashes($_POST['caption']);
    $category = $_POST['category'];
    if(empty($caption)){
        echo "please enter a caption";
    }
    $q = 'UPDATE images SET categ_id = '.$categ_id.', category = "'.$category.'", caption = "'.$caption.'" WHERE img_id = '.$img_id;
    $r = mysqli_query($conn, $q);
    if($r) {
        header('location: ../photos.php?categ_id='.$categ_id);
    } else {
        echo "Mysql Error: ".mysqli_error($conn);
    }
?>