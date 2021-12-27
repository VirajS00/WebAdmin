<?php
    $update = $_POST['update'];
    $video_ids = json_decode($_POST['video_ids']);
    $total = $_POST['total'];

    $obj = [];

    include('connect.php');

    $q = 'SELECT * FROM films';
    $r = mysqli_query($conn, $q);

    // $video_ids = rsort($video_ids);

    if($r) {
        if(mysqli_num_rows($r) === 0) {
            $video_ids_insert = "";
            foreach(array_reverse($video_ids) as $video_id) {
                $video_ids_insert .= "('$video_id'),";
            }
            $q1 = "INSERT INTO films (film_id) VALUES ".rtrim($video_ids_insert, ",");
            $r1 = mysqli_query($conn, $q1);
            if($r1) {
                array_push($obj, ["success" => "Updated values successfully"]);
            } else {
                $error = ['error'=>mysqli_error($conn)];
                array_push($obj, $error);
            }
        } else {
            $video_ids_db = [];
            while($row = mysqli_fetch_array($r)) {
                array_push($video_ids_db, $row['film_id']);
            }
            if($total > mysqli_num_rows($r)) {
                $diff = array_diff($video_ids, $video_ids_db);
                $video_ids_to_insert = "";
                foreach($diff as $new) {
                    $video_ids_to_insert .= "('$new'),";
                }
                $video_ids_to_insert = rtrim($video_ids_to_insert, ",");
                $q2 = "INSERT INTO films (film_id) VALUES ".$video_ids_to_insert;
                $r2 = mysqli_query($conn, $q2);
                if($r2) {
                    $success = ['success'=>'updated value(s) successfully'];
                    array_push($obj, $success);
                } else {
                    $error = ['error'=>mysqli_error($conn)];
                    array_push($obj, $error);
                }
            } else if($total < mysqli_num_rows($r)) {
                $diff1 = array_diff($video_ids_db, $video_ids);
                $video_ids_to_remove = "";
                foreach($diff1 as $new) {
                    $video_ids_to_remove .= "$new,";
                }
                $video_ids_to_remove = rtrim($video_ids_to_remove, ",");
                $q3 = 'DELETE FROM films WHERE film_id IN (\''.$video_ids_to_remove.'\')';
                $r3 = mysqli_query($conn, $q3);
                if($r3) {
                    $success = ['success'=>'removed value(s) successfully'];
                    array_push($obj, $success);
                } else {
                    $error = ['error'=>mysqli_error($conn)];
                    array_push($obj, $error);
                }
            } else {
                $success = ['success'=>'no values to update'];
                array_push($obj, $success);
            }
        }
    } else {
        $error = ['error'=>mysqli_error($conn)];
        array_push($obj, $error);
    }

    echo json_encode($obj);
?>