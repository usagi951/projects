<?php
 
    //echo $_FILES['file']['name'];
    //echo '<br>';
    //echo $_FILES['file']['type'];
    //echo '<br>';
    //echo $_FILES['file']['tmp_name'];
    //echo '<br>';
    //echo $_FILES['file']['error'];
    //echo '<br>';
    //echo $_FILES['file']['size'];
    //echo '<br>';

    //$location = 'upload/' .substr(hash('sha256', uniqid(time())), 0, 10).'_'.$_FILES['file']['name'];

    //move_uploaded_file($_FILES['file']['tmp_name'], $location);

    //input:　file(png or jpeg)

    //output: 
    //{"state": true, "message" : "檔案上傳成功", "dataInfo" : "檔案相關訊息name/type/tmp_name/error/size"}
    //{"state": false, "message" : "檔案上傳失敗", "dataInfo" : "檔案相關訊息name/type/tmp_name/error/size"}
    //{"state": false, "message" : "檔案不存在"}
    //{"state": false, "message" : "檔案不符合規定(png or jpeg)"}

    if(isset($_FILES['file']['name']) && $_FILES['file']['name'] != ""){
        if($_FILES['file']['type'] == 'image/jpeg' || $_FILES['file']['type'] == 'image/png'){
            $location = 'upload/' .substr(hash('sha256', uniqid(time())), 0, 10).'_'.$_FILES['file']['name'];
            move_uploaded_file($_FILES['file']['tmp_name'], $location);

            $datainfo = array();
            $datainfo["location_name"] = $location ;
            $datainfo["origin_name"] = $_FILES['file']['name'];
            $datainfo["type"] = $_FILES['file']['type'];
            $datainfo["size"] = $_FILES['file']['size'];
            $datainfo["tmp_name"] = $_FILES['file']['tmp_name'];

            echo '{"state": true, "message" : "檔案上傳成功", "dataInfo" : '.json_encode($datainfo).'}';
        }else{
            echo '{"state": false, "message" : "檔案不符合規定(png or jpeg)"}';
        }
    }else{
        echo '{"state": false, "message" : "檔案不存在"}';
    }
?>