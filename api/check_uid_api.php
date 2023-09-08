<?php
    if(isset($_POST["uid"])){
        if($_POST["uid"] != ""){
            $p_uid = $_POST["uid"];

            require_once "dbtools.php";
            $conn = create_connect();
            $sql = "SELECT ID, Username, Nickname, Email, Uid01, Created_at FROM member WHERE Uid01 = '$p_uid'"; 
            
            $result = execute_sql($conn, 'testdb', $sql);
            if(mysqli_num_rows($result) == 1){
                $mydata = array();
                while($row = mysqli_fetch_assoc($result)){
                    $mydata[] = $row;
                }       
                echo '{"state" : true, "message" : "uid驗證成功", "data" : '.json_encode($mydata).'}';
            }else{
                echo '{"state" : false, "message" : "uid驗證失敗"}';
            }
            mysqli_close($conn);
        }else{
            echo '{"state" : false, "message" : "欄位不允許空白"}';
        }
    }else{
        echo '{"state" : false, "message" : "欄位錯誤"}';
    }
?>