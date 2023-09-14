<?php
    $servername = "localhost";
    $username = "owner01";
    $password = "123456";

    // 建立連線 Create connection
    $conn = mysqli_connect($servernamem, $username, $password);
    // conn 通道
    // 確認連線 Check connection
    if(!$conn){
        die("建立連線失敗".mysqli_connect_error());
    }

    echo "連線成功!";
?>