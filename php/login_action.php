<?php
    include('connect.php');
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $user = stripslashes($user);
    $pass = stripslashes($pass);
    if (empty($user)) {
	    echo "please enter username";
    }
    else if(empty($pass)){
        echo "please enter password";
    } 
    else if(empty($user) && empty($pass)){
        echo "please enter username and password";
    } else {
        $q = "SELECT * FROM login WHERE user_name = '$user' AND password = SHA1('$pass')";
        $r = mysqli_query($conn, $q);
        if($r) {
            if (mysqli_num_rows($r) == 1) {
                header("Location: ../home.php");
                session_start();
                $data = mysqli_fetch_object($r);
                $_SESSION['user_id'] = $data->user_id;
                $_SESSION['user_name'] = $data->user_name;
                echo "sucess";
            } else {
                echo 'username or password not found';
            }
        } else {
            echo "error: ".mysqli_error($conn);
        }
    }
?>