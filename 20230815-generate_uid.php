<?php
    // 時間戳記
    echo '時間戳記'.time();
    echo '<BR>';

    // 符合sql時間規格
    echo date("Y:m:d h:i:s");
    echo '<BR>';

    // uniqid
    echo uniqid();
    echo '<BR>';
    echo uniqid(time());
    echo '<BR>';

    // hash 雜湊函數
    echo hash('md5',time());
    echo '<BR>';

    echo hash('sha512',time());
    echo '<BR>';

    echo hash('sha256',time());
    echo '<BR>';

    // 產生安全的UID
    echo '********產生安全的UID********';
    echo '<BR>';
    echo hash('sha256', uniqid(time()));
    echo '<BR>';
    echo substr(hash('sha256', uniqid(time())), 0, 10);
    echo '<BR>';
?>