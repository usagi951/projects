<?php
    // 外部傳遞pname, price, pnum, id
    // 執行更新行為
    // 使用postman測試
    // 四個欄位必須存在且不為空
    if(isset($_POST["pname"]) && isset($_POST["price"]) && isset($_POST["pnum"]) && isset($_POST["id"])){
        if($_POST["pname"] != "" && $_POST["price"] !="" && $_POST["pnum"] != "" && $_POST["id"] !=""){
            $p_pname = $_POST["pname"];
            $p_price = $_POST["price"];
            $p_pnum  = $_POST["pnum"];
            $p_id    = $_POST["id"];   

            require_once "dbtools.php";
            $conn = create_connect();
            $sql = "UPDATE product SET Pname ='$p_pname', Price = '$p_price', Pnum = '$p_pnum' WHERE ID = '$p_id'";
            if(execute_sql($conn, 'testdb', $sql)){
                echo '{"state" : true, "message" : "更新成功"}';
            }else{
                echo '{"state" : false, "message" : "更新失敗"}';
            }

            mysqli_close($conn);
    }else{
        echo '{"state" : false, "message" : "欄位不允許空白"}';
    }
}else{
    echo '{"state" : false, "message" : "欄位錯誤"}';
}


?>