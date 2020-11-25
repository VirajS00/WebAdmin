<?php
    if($_POST) {
        include('connect.php');
        $id = $_POST['id'];
        $q = 'DELETE FROM feedback WHERE id = '.$id;
        $r = mysqli_query($conn, $q);
        if($r) {
            exit('success');
        } else {
            exit("MySQL Error: ".mysqli_error($conn));
        }
    }
?>

<script src="../js/feedback.js"></script>