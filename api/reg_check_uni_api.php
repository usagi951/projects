<?php
    if(isset($_POST["username"])){
        if($_POST["username"] != ""){
            $p_username = $_POST["username"];

            require_once "dbtools.php";

            $conn = create_connect();
            $sql = "SELECT Username FROM member WHERE Username = '$p_username'";
            $result = execute_sql($conn, 'testdb', $sql);

            if(mysqli_num_rows($result) == 0){
                //此帳號不存在，可以使用
                echo '{"state" : true, "message" : "此帳號不存在，可以使用"}';
            }else{
                //此帳號存在，不可以使用
                echo '{"state" : false, "message" : "此帳號存在，不可以使用"}';
            }
            mysqli_close($conn);
        }else{
            echo '{"state" : false, "message" : "欄位不允許空白"}';
        }
    }else{
        echo '{"state" : false, "message" : "欄位錯誤"}';
    }
?>