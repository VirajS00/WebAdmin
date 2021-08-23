<?php
    require('connect.php');
    if($_POST) {
        $title = trim(addslashes($_POST['title']));
        $very_short_desc = trim(addslashes($_POST['very-short-desc']));
        $short_desc = trim(addslashes($_POST['short_desc']));
        $desc = trim(addslashes($_POST['desc']));
        $video_img = trim(addslashes($_POST['video-img']));
        $id = $_POST['id'];
        $platform = $_POST['platform'];
        $GitLink = $_POST['GitLink'];
        $ProjectLink = $_POST['ProjectLink'];
        $platforms = implode(',', $platform);

        $q = "UPDATE other SET title = '$title', very_short_desc = '$very_short_desc', short_desc = '$short_desc', description = '$desc', video_img = '$video_img', platform = '$platforms', git_link = '$GitLink', project_link = '$ProjectLink' WHERE id = $id";
        $r = mysqli_query($conn, $q);
        if($r) {
            header('location: ../other.php');
        } else {
            echo "MySQL Error: ".mysqli_error($conn);
        }
    }
?>