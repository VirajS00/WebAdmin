<?php
    $video_id = $_POST['video_id'];
    $category = $_POST['category'];

    $output = [];

    include('connect.php');

    $q = 'UPDATE films SET category = \''.$category.'\' WHERE film_id = \''.$video_id.'\'';
    $r = mysqli_query($conn, $q);

    if($r) {
        $output = ["Success" => "Updated Sucessfully"];
    } else {
        $output = ["Error" => "MySQL Error: ".mysqli_error($conn)];
    }

    echo json_encode($output);
?>