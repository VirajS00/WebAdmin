<?php
    $video_id = $_POST['video_id'];
    $my_role = $_POST['my_role'];

    $output = [];
    
    include('connect.php');

    $q = 'UPDATE films SET my_role = \''.$my_role.'\' WHERE film_id = \''.$video_id.'\'';
    $r = mysqli_query($conn, $q);
    if($r) {
        $output = ["Success" => "Updated Sucessfully"];
    } else {
        $output = ["Error" => "MySQL Error: ".mysqli_error($conn)];
    }

    echo json_encode($output);
?>