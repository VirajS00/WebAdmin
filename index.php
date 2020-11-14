<?php 
    include_once("getDetails.php");
    $userData = new getUserDetails;
    
    echo $userData->getDeviceType() . "<br>";
    echo $userData->getBrowser() ."<br>";
?> 