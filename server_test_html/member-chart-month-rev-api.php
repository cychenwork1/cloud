<?php
// {"state":true,"data":[{"level":"900","level_num":"50"}],"message":"取得資料成功"}
// {"state":false,"message":"取得資料和錯誤代碼等"}
$data = file_get_contents("php://input", "r");
$mydata = array();
$mydata = json_decode($data, true);


if (isset($mydata["month"])) {
    if ($mydata["month"] != "") {
        $month = $mydata["month"];

        // 檢查 month 是否在 1 到 12 的範圍內
        if ($month < 1 || $month > 12) {
            echo '{"state":false,"message":"月份必須在1到12之間"}';
            exit(); // 停止後續程式執行
        }
        switch ($month) {
            case "1":
                $month = "jan_revenue";
                break;
            case "2":
                $month = "feb_revenue";
                break;
            case "3":
                $month = "mar_revenue";
                break;
            case "4":
                $month = "apr_revenue";
                break;
            case "5":
                $month = "may_revenue";
                break;
            case "6":
                $month = "jun_revenue";
                break;
            case "7":
                $month = "jul_revenue";
                break;
            case "8":
                $month = "aug_revenue";
                break;
            case "9":
                $month = "sep_revenue";
                break;
            case "10":
                $month = "oct_revenue";
                break;
            case "11":
                $month = "nov_revenue";
                break;
            case "12":
                $month = "dec_revenue";
                break;
            default:
                echo '{"state":false,"message":"無效的月份"}';
                exit(); // 停止後續程式執行
        }


        require_once("dbtools.php");
        $link = create_connection();


        $sql = "SELECT sum($month) as month_rev FROM member ";
        $result = execute_sql($link, "testdb", $sql);
        $mydata = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $mydata[] = $row;
        };
        echo '{"state":true,"data":' . json_encode($mydata) . ',"message":"取得資料成功"}';



        mysqli_close($link);
    } else {
        echo '{"state":false,"message":"欄位不得為空白"}';
    }
} else {
    echo '{"state":false,"message":"欄位錯誤"}';
}
