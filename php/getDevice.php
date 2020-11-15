<?php
    include('connect.php');
    $q1 = 'SELECT DISTINCT DeviceType FROM userData';
    $r1 = mysqli_query($conn, $q1);
    $devices = [];
    $device_count = [];
    if($r1) {
        while($ro = mysqli_fetch_array($r1)) {
            $devices[] = $ro['DeviceType'];
        }
        foreach($devices as $device) {
            $q = "SELECT COUNT(DeviceType) AS device_count FROM userData WHERE DeviceType = '$device'";
            $r = mysqli_query($conn, $q);
            if($r) {
                $data = mysqli_fetch_object($r);
                $count = $data->device_count;
                array_push($device_count, [$device, (int)$count]);
            }
        }
        echo json_encode($device_count);
    }
?>