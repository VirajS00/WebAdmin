<?php
    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    $upload_dir = '../../filmImages/';

    $jpg_img = $_FILES['jpg_img'];
    $webp_img = $_FILES['webp_img'];

    $id = $_POST['id'];

    $og_tmp_name = $jpg_img['tmp_name'];
	$og_file_name = $jpg_img['name'];
	$og_file_type = $jpg_img['type'];
	$upload_path = $upload_dir.$og_file_name;

    $webp_tmp_name = $webp_img['tmp_name'];

    $ext = 'jpg';

    // if ($og_file_type == 'image/jpeg') {
    //     $ext = 'jpg';
    // } else if ($og_file_type == 'image/png') {
    //     $ext = 'png';
    // }

    $new_name = generateRandomString();

	$new_name_og = $new_name.'.'.$ext;
    $new_name_webp = $new_name.'.webp';
    
    $jpg = move_uploaded_file($og_tmp_name, $upload_dir.$new_name_og);
	$webp = move_uploaded_file($webp_tmp_name, $upload_dir.$new_name_webp);


    if(!$jpg || !$webp) {
        echo "error";
    } else {
        include('connect.php');
        $q = "SELECT images FROM films WHERE film_id='$id'";
        $r = mysqli_query($conn, $q);

        if($r) {
            $row = mysqli_fetch_array($r);
    
            $images = $row['images'];
    
            if($images === '') {
                $images = $new_name;
            } else {
                $images .= ",$new_name";
            }
    
            $q1 = "UPDATE films SET images = '$images' WHERE film_id = '$id'";
    
            $r1 = mysqli_query($conn, $q1);

            if($r1) {
                echo "sucess";
            } else {
                echo mysqli_error($conn);
            }
        } else {
            echo mysqli_error($conn);
        }
    }

?>