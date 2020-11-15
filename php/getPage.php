<?php
    include('connect.php');
    $q1 = 'SELECT DISTINCT Page FROM userData';
    $r1 = mysqli_query($conn, $q1);
    $pages = [];
    $page_count = [];
    if($r1) {
        while($ro = mysqli_fetch_array($r1)) {
            $pages[] = $ro['Page'];
        }
        foreach($pages as $page) {
            $q = "SELECT COUNT(Page) AS page_count FROM userData WHERE Page = '$page'";
            $r = mysqli_query($conn, $q);
            if($r) {
                $data = mysqli_fetch_object($r);
                $count = $data->page_count;
                array_push($page_count, [$page, (int)$count]);
            }
        }
        echo json_encode($page_count);
    }
?>