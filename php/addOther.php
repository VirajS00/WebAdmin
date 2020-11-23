<?php
    include('connect.php');
    if($_POST) {
        $title = addslashes($_POST['title']);
        $very_short_desc = addslashes($_POST['very-short-desc']);
        $short_desc = addslashes($_POST['short_desc']);
        $desc = addslashes($_POST['desc']);
        $video_img = addslashes($_POST['video-img']);
        $img_small = $_POST['img_small'];
        $img_large = $_POST['img_large'];
        $platform = $_POST['platform'];
        $platforms = implode(',', $platform);

        $q = "INSERT INTO other (id, title, very_short_desc, short_desc, description, video_img, platform, img_small, img_large, sort) VALUES(NULL, '$title', '$very_short_desc', '$short_desc', '$desc', '$video_img', '$platforms', 'otherImages/$img_small', 'otherImages/$img_large', 0)";
        $r = mysqli_query($conn, $q);
        if($r) {
            header('location: ../other.php');
        } else {
            echo "MySQL Error: ".mysqli_error($conn);
        }
    }
?>