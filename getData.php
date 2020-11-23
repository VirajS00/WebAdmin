<?php 
    include_once("php/getDetails.php");
    include('php/connect.php');

    $userData = new getUserDetails;

    $device = $userData->getDeviceType();
    $browser = $userData->getBrowser();
    $os = $userData->getOS();
    $pageName = $userData->getPageName();
    $country = $userData->getCountry();
    $counter = $userData->countHits();

    $q = "INSERT INTO userData (id, DeviceType, Browser, OS, Page, Country) VALUES (NULL, '$device', '$browser', '$os', '$pageName', '$country')";
    $res = mysqli_query($conn, $q);
    if(!$res) {
        echo "Mysql error: ".mysqli_error($conn);
    }
?> 