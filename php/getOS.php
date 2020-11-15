<?php
    include('connect.php');
    $q1 = 'SELECT DISTINCT OS FROM userData';
    $r1 = mysqli_query($conn, $q1);
    $os = [];
    $os_count = [];
    if($r1) {
        while($ro = mysqli_fetch_array($r1)) {
            $os[] = $ro['OS'];
        }
        foreach($os as $OS) {
            $q = "SELECT COUNT(OS) AS os_count FROM userData WHERE OS = '$OS'";
            $r = mysqli_query($conn, $q);
            if($r) {
                $data = mysqli_fetch_object($r);
                $count = $data->os_count;
                array_push($os_count, [$OS, (int)$count]);
            }
        }
        echo json_encode($os_count);
    }
?>