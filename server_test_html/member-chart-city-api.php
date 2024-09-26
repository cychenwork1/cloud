<?php
// {"state":true,"data":[{"level":"900","level_num":"50"}],"message":"取得資料成功"}
// {"state":false,"message":"取得資料和錯誤代碼等"}







require_once("dbtools.php");
$link = create_connection();


$sql = "SELECT count(City) as city_num,City as city FROM member GROUP BY City";
$result = execute_sql($link, "testdb", $sql);
$mydata = array();
while ($row = mysqli_fetch_assoc($result)) {
    $mydata[] = $row;
};
echo '{"state":true,"data":' . json_encode($mydata) . ',"message":"取得資料成功"}';



mysqli_close($link);
?>