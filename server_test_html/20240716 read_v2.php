<?php
$servername = "localhost";
$username = "owner";
$password = "123456";
$dbname = "testdb";


$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    // echo "連線失敗";
    die("連線失敗" . mysqli_connect_error());
}

$sql = "SELECT * FROM product ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // $row = mysqli_fetch_assoc($result);
    // echo "Id=".$row["Id"]."Name=".$row["Name"];


    $mydata = array();
    while ($row = mysqli_fetch_assoc($result)) {
        // echo "Id=" . $row["Id"] . "Name=" . $row("Name");
        $mydata[] = $row;
    }



    // echo json_encode($mydata);
    echo '{"state":true,"data":'. json_encode($mydata) . ',"message":"讀取所有產品成功"}';
} else {
    echo '{"state":false,"message":"欄位錯誤讀取失敗和錯誤代碼等"}';
}
mysqli_close($conn);
