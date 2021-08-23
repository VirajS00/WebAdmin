<?php
    $resource_name = $_POST['resource_name'];
    $short_desc = $_POST['short_desc'];
    $category = $_POST['category'];
    $links_data = $_POST['links_data'];
    $type = $_POST['resource_type'];
    $id = $_POST['id'];

    $response = [];

    if(empty($resource_name) || empty($short_desc) || $category == 'null' || empty($links_data)) {
        $response = [
            "status" => 0,
            "message" => "Empty feilds"
        ];
    } else {
        include('connect.php');
        $q = "UPDATE resources SET name = '".addslashes($resource_name)."', type = '".addslashes($type)."', short_desc = '".addslashes($short_desc)."', links = '".addslashes($links_data)."', category = '".addslashes($category)."' WHERE id = $id";
        if(mysqli_query($conn, $q)) {
            $response = [
                "status" => 1,
                "message" => "Updated Sucessfully, <a ></a>"
            ];
        } else {
            $response = [
                "status" => 0,
                "message" => "MySQL error: ".mysqli_error($conn)
            ];
        }
    }

    echo json_encode($response);
?>