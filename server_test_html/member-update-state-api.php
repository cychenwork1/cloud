<?php
//{"id":"xxx","active":"0"}

// {"state":true,"message":"會員狀態更新成功"}
// {"state":false,"message":"會員狀態更新失敗和錯誤代碼等"}
// {"state":false,"message":"欄位不得為空白"}
// {"state":false,"message":"欄位錯誤"}



$data = file_get_contents("php://input", "r");
$mydata = array();
$mydata = json_decode($data, true);


if (isset($mydata["id"]) && isset($mydata["active"])) {
    if ($mydata["id"] != "" && $mydata["active"] != "") {
        $p_id = $mydata["id"];
        $p_active = $mydata["active"];



        require_once("dbtools.php");
        $link = create_connection();


        $sql = "UPDATE member SET Active ='$p_active'  WHERE ID = '$p_id'";
        if (execute_sql($link, "testdb", $sql)) {
            echo '{"state":true,"message":"會員狀態更新成功"}';
        } else {
            echo '{"state":false,"message":"會員狀態更新失敗和錯誤代碼等"}';
        }


        mysqli_close($link);
    } else {
        echo '{"state":false,"message":"欄位不得為空白"}';
    }
} else {
    echo '{"state":false,"message":"欄位錯誤"}';
}
