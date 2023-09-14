<?php
    $servername = "localhost";
    $username = "owner01";
    $password = "123456";
    $dbname = "testdb";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
    die("連線失敗" . mysqli_connect_error());
    }

    $sql = "SELECT ID, Pname, Price, Pnum, Created_at FROM product";
    $result = mysqli_query($conn, $sql);

    $mydata = array();

    if(mysqli_num_rows($result) > 0){
        while ($row = mysqli_fetch_assoc($result)) {
            $mydata[] = $row;
            // echo $row["ID"];
            // echo $row["Pname"];
            // echo $row["Price"];
            // echo $row["Pnum"];
            // echo $row["Created_at"];
            // echo "<BR>";
        }

        echo json_encode($mydata);
    }else{
        echo "查無資料";
    }

// fetch 抓一筆印出來

// $row = mysqli_fetch_assoc($result);

// echo $row["ID"];
// echo $row["Pname"];
// echo $row["Price"];
// echo $row["Pnum"];
// echo $row["Created_at"];
// echo "<BR>";

// $row = mysqli_fetch_assoc($result);

// echo $row["ID"];
// echo $row["Pname"];
// echo $row["Price"];
// echo $row["Pnum"];
// echo $row["Created_at"];
// echo "<BR>";

    mysqli_close($conn);
?>