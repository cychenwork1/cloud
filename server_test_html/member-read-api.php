<?php
// {"state":true,data:"所有會員資訊","message":"讀取會員資料成功"}
// {"state":false,"message":讀取會員資料失敗"}







require_once("dbtools.php");
$link = create_connection();


$sql = "SELECT ID,Username,Email,Uid01,Active,Level,Created_at FROM member ORDER BY ID ASC";
$result = execute_sql($link, "testdb", $sql);
$mydata=array();
while($row = mysqli_fetch_assoc($result)){
    $mydata[]=$row;
};
echo '{"state":true,"data":' . json_encode($mydata) . ',"message":"讀取會員資料成功"}';



mysqli_close($link);
