<?php
    header("Access-Control-Allow-Origin: *");
    $url='https://media.taiwan.net.tw/XMLReleaseALL_public/hotel_C_f.json';
    $thisData = file_get_contents($url);
    echo $thisData;
?>