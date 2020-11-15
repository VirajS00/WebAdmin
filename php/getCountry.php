<?php
    include('connect.php');
    $q1 = 'SELECT DISTINCT Country FROM userData';
    $r1 = mysqli_query($conn, $q1);
    $countries = [];
    $country_count = [];
    if($r1) {
        while($ro = mysqli_fetch_array($r1)) {
            $countries[] = $ro['Country'];
        }
        foreach($countries as $country) {
            $q = "SELECT COUNT(Country) AS Country_count FROM userData WHERE Country = '$country'";
            $r = mysqli_query($conn, $q);
            if($r) {
                $data = mysqli_fetch_object($r);
                $count = $data->Country_count;
                // echo "$OS: $count<br>";
                array_push($country_count, [$country, (int)$count]);
            }
        }
        echo json_encode($country_count);
    }
?>