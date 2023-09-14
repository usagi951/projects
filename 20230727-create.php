<?php
    if(isset($_POST["pname"]) && isset($_POST["price"]) && isset($_POST["pnum"])){
        if($_POST["pname"] != "" && $_POST["price"] != "" && $_POST["pnum"] != ""){
    $p_pname = $_POST["pname"];
    $p_price = $_POST["price"];
    $p_pnum = $_POST["pnum"];

    $servername = "localhost";
    $username = "owner01";
    $password = "123456";
    $dbname = "testdb";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if(!$conn){
        die("連線錯誤!".mysqli_connect_error());
    }

    $sql = "INSERT INTO product(Pname, Price, Pnum) VALUES('$p_pname', '$p_price', '$p_pnum')";
    if(mysqli_query($conn, $sql)){
        echo '{"state" : true, "message" : "新增成功"}';
        // json格式
    }else{
        echo '{"state" : false, "message" : "新增失敗"}';
    }
    mysqli_close($conn);
    }else{
        echo '{"state" : false, "message" : "欄位不允許空白"}';
    }
}else{
    echo '{"state" : false, "message" : "欄位錯誤"}';
}
?>
