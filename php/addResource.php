<?php
    $resource_name = $_POST['resource_name'];
    $short_desc = $_POST['short_desc'];
    $category = $_POST['category'];
    $links_data = $_POST['links_data'];

    echo "$resource_name\n$short_desc\n$category\n$links_data";
?>