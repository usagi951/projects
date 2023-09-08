<?php
    if(isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["nickname"]) && isset($_POST["email"])){
        if($_POST["username"] != "" && $_POST["password"] != "" && $_POST["nickname"] != "" && $_POST["email"] != ""){
            $p_username = $_POST["username"];
            //前五後五
            $p_password = substr(md5($_POST["password"]), 0, 5).substr(md5($_POST["password"]), 27, 5); 
            $p_nickname = $_POST["nickname"];
            $p_email    = $_POST["email"];

            require_once "dbtools.php";

            $conn = create_connect();
            $sql = "INSERT INTO member(Username, Password, Nickname, Email) VALUES('$p_username', '$p_password', '$p_nickname', '$p_email')";
            if(execute_sql($conn, 'testdb', $sql)){
                echo '{"state" : true, "message" : "註冊成功"}';
            }else{
                echo '{"state" : false, "message" : "註冊失敗"}';
            }
            mysqli_close($conn);
        }else{
            echo '{"state" : false, "message" : "欄位不允許空白"}';
        }
    }else{
        echo '{"state" : false, "message" : "欄位錯誤"}';
    }
?>