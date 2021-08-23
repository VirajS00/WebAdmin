<?php
    include('connect.php');
    if(isset($_POST['update'])){
        $positions = json_decode($_POST['positions']);
        foreach($positions as $position){
            $index = $position[0];
            $newPosition = $position[1];
            $q1 = 'UPDATE resources SET sort = '.$newPosition.' WHERE id = '.$index;
            $r1 = mysqli_query($conn, $q1);
            if(!$r1) {
                exit('error: '.mysqli_error($conn));
            }
        }
        exit('success');
    }
?>