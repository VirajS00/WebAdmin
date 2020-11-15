<?php
    include('connect.php');
    $q1 = 'SELECT DISTINCT Browser FROM userData';
    $r1 = mysqli_query($conn, $q1);
    $browsers = [];
    $browser_count = [];
    if($r1) {
        while($ro = mysqli_fetch_array($r1)) {
            $browsers[] = $ro['Browser'];
        }
        foreach($browsers as $browser) {
            $q = "SELECT COUNT(Browser) AS Browser_count FROM userData WHERE Browser = '$browser'";
            $r = mysqli_query($conn, $q);
            if($r) {
                $data = mysqli_fetch_object($r);
                $count = $data->Browser_count;
                // echo "$OS: $count<br>";
                array_push($browser_count, [$browser, (int)$count]);
            }
        }
        echo json_encode($browser_count);
    }
?>