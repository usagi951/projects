<?php
// username: 帳號(不得為空白，必須存在)
// password: 密碼(不得為空白，必須存在)
    if(isset($_POST["username"]) && isset($_POST["password"])){
        if($_POST["username"] != "" && $_POST["password"] != ""){
            $p_username = $_POST["username"];
            $p_password = substr(md5($_POST["password"]), 0, 5).substr(md5($_POST["password"]), 27, 5); 

            require_once "dbtools.php";

            $conn = create_connect();
            $sql = "SELECT Username, Password FROM member WHERE Username = '$p_username' AND Password = '$p_password'";
            $result = execute_sql($conn, 'testdb', $sql);

            if(mysqli_num_rows($result) == 1){
                //登入成功
                //1. 產生uid01回傳至前端(儲存至cookie)
                //2. 並儲存至資料庫
                $uid01 = substr(hash('sha256', uniqid(time())), 0, 10);
                $sql = "UPDATE member SET Uid01 = '$uid01' WHERE Username = '$p_username'";
                if(execute_sql($conn, 'testdb', $sql)){
                    //撈取出最新的會員資料
                    $sql = "SELECT Username, Nickname, Email, Uid01, UserState FROM member WHERE Username = '$p_username' AND Password = '$p_password'";
                    $result = execute_sql($conn, 'testdb', $sql);
                    
                    $mydata = array();
                    while($row = mysqli_fetch_assoc($result)){
                        $mydata[] = $row;
                    }

                    echo '{"state" : true, "message" : "登入成功",  "data" : '.json_encode($mydata).'}';
                }else{
                    //uid更新失敗
                    echo '{"state" : false, "message" : "uid更新失敗"}';
                }
            }else{
                //登入失敗
                echo '{"state" : false, "message" : "登入失敗"}';
            }
            mysqli_close($conn);
        }else{
            echo '{"state" : false, "message" : "欄位不允許空白"}';
        }
    }else{
        echo '{"state" : false, "message" : "欄位錯誤"}';
    }
?>