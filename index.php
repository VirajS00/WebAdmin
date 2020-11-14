<?php 
    include_once("getDetails.php");
    $userData = new getUserDetails;
    
    echo $userData->getDeviceType() . "<br>";
    echo $userData->getBrowser() ."<br>";
    echo $userData->getOS() . "<br>";
    echo $userData->getPageName() . "<br>";
    print_r($userData->getLocation());
?> 