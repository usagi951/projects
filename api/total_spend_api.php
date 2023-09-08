<?php
    if(isset($_POST["id"]) && isset($_POST["nickname"]) && isset($_POST["email"])){
        if($_POST["id"] != "" && $_POST["nickname"] != "" && $_POST["email"] != ""){
            $p_id = $_POST["id"];
            $p_nickname = $_POST["nickname"];
            $p_email    = $_POST["email"];

            require_once "dbtools.php";

            $conn = create_connect();
            $sql = "UPDATE member SET Nickname = '$p_nickname', Email = '$p_email' WHERE ID = '$p_id'";
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