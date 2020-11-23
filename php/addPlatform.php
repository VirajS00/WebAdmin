<?php
    include('connect.php');
    if($_POST) {
        $name = addslashes($_POST['platform_name']);
        $link = $_POST['platform_link'];
        $img_url = $_POST['platform_img_url'];
        $code = '';

        if(empty($link)) {
            $code = '<img src="otherImages/platforms/'.$img_url.'" class="platformimg" title="'.$name.'" alt="'.$name.'" height="100px">';
        } else {
            $code = '<a href="'.$link.'" target="_blank" class="platformlink"><img src="otherImages/platforms/'.$img_url.'" class="platformimg" title="'.$name.'" alt="'.$name.'" height="100px"></a>';
        }

        $q = 'INSERT INTO platforms (id, img_code, platform_name) VALUES (NULL, "'.addslashes($code).'", "'.$name.'")';
        $r = mysqli_query($conn, $q);
        if($r) {
            header('location: ../platforms.php');
        } else {
            echo "MySQL Error: ".mysqli_error($conn);
        }
    }
?>
