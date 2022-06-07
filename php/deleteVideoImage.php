<?php
    include('connect.php');

    $image_name = $_POST['image_name'];
    $id = $_POST['id'];
    $video_id = $_POST['video_id'];

    $q = 'SELECT images FROM films WHERE film_id = \''.$id.'\'';
    $r = mysqli_query($conn, $q);

    if($r) {
        $row = mysqli_fetch_array($r);
        $images = $row['images'];
        $image = explode(',', $images);

        foreach($image as $key => $im) {
            if (($key = array_search($image_name, $image)) !== false) {
                unset($image[$key]);
            }
        }

        $images_str_new = implode(',', $image);

        $q1 = "UPDATE films SET images = '".$images_str_new."' WHERE film_id='".$id."'";
        $r1 = mysqli_query($conn, $q1);

        if($r1) {
            unlink("../../filmImages/".$image_name.".jpg");
            unlink("../../filmImages/".$image_name.".webp");

            header("Location: ../videoImages.php?id=$id&video_id=$video_id");
        } else {
            echo "MySQL Error: ".mysqli_error($conn);
        }

    } else {
        echo "MySQL Error: ".mysqli_error($conn);
    }

?>