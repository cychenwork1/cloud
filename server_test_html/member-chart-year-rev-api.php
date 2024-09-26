<?php
// {"state":true,"data":[{"level":"900","level_num":"50"}],"message":"取得資料成功"}
// {"state":false,"message":"取得資料和錯誤代碼等"}
$data = file_get_contents("php://input", "r");
$mydata = array();
$mydata = json_decode($data, true);





require_once("dbtools.php");
$link = create_connection();


$sql = "SELECT sum(jan_revenue+feb_revenue+mar_revenue+apr_revenue+may_revenue+jun_revenue+jul_revenue+aug_revenue+sep_revenue+oct_revenue+nov_revenue+dec_revenue) as year_rev FROM member ";
$result = execute_sql($link, "testdb", $sql);
$mydata = array();
while ($row = mysqli_fetch_assoc($result)) {
    $mydata[] = $row;
};
echo '{"state":true,"data":' . json_encode($mydata) . ',"message":"取得資料成功"}';



mysqli_close($link);
?>