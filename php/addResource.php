<?php
    $resource_name = $_POST['resource_name'];
    $short_desc = $_POST['short_desc'];
    $category = $_POST['category'];
    $links_data = $_POST['links_data'];
    $type = $_POST['resource_type'];

    $response = [];

    if(empty($resource_name) || empty($short_desc) || $category == 'null' || empty($links_data)) {
        $response = [
            "status" => 0,
            "message" => "Empty feilds"
        ];
    } else {
        include('connect.php');
        $q = "INSERT INTO resources (id, name, type, short_desc, links, category) VALUES (NULL, '".addslashes($resource_name)."', '".addslashes($type)."', '".addslashes($short_desc)."', '".addslashes($links_data)."', '".addslashes($category)."')";
        if(mysqli_query($conn, $q)) {
            $response = [
                "status" => 1,
                "message" => "Entry Sucessful"
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