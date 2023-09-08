<?php
    if(isset($_POST["id"]) && isset($_POST["userstate"])){
        if($_POST["id"] != "" && $_POST["userstate"] != "" ){
            $p_id = $_POST["id"];
            $p_userstate = $_POST["userstate"];
            

            require_once "dbtools.php";

            $conn = create_connect();
            $sql = "UPDATE member SET UserState = '$p_userstate' WHERE ID = '$p_id'";
            if(execute_sql($conn, 'testdb', $sql)){
                echo '{"state" : true, "message" : "狀態更新成功"}';
            }else{
                echo '{"state" : false, "message" : "狀態更新失敗"}';
            }
            mysqli_close($conn);
        }else{
            echo '{"state" : false, "message" : "欄位不允許空白"}';
        }
    }else{
        echo '{"state" : false, "message" : "欄位錯誤"}';
    }
?>