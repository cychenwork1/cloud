<?php
//{"id":"xxx"}

// {"state":true,"message":"刪除成功"}
// {"state":false,"message":"刪除失敗和錯誤代碼等"}
// {"state":false,"message":"欄位不得為空白"}
// {"state":false,"message":"欄位錯誤"}



$data = file_get_contents("php://input", "r");
$mydata = array();
$mydata = json_decode($data, true);


if (isset($mydata["id"])) {
    if ($mydata["id"] != "" ) {
        $p_id = $mydata["id"];
        



        require_once("dbtools.php");
        $link = create_connection();


        $sql = "DELETE FROM member  WHERE ID = '$p_id'";
        if (execute_sql($link, "testdb", $sql)) {
            echo '{"state":true,"message":"刪除成功"}';
        } else {
            echo '{"state":false,"message":"刪除失敗和錯誤代碼等"}';
        }


        mysqli_close($link);
    } else {
        echo '{"state":false,"message":"欄位不得為空白"}';
    }
} else {
    echo '{"state":false,"message":"欄位錯誤"}';
}