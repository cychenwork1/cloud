<?php
//{"username":"owner01",password":"123456","email":"owner@test.com"}

$data = file_get_contents("php://input", "r");
$mydata = array();
$mydata = json_decode($data, true);


if (isset($mydata["uid01"])) {
    if ($mydata["uid01"] != "") {
        $p_uid01 = $mydata["uid01"];



        require_once("dbtools.php");
        $link = create_connection();


        $sql= "SELECT ID,Username,Email,Uid01,Active,Level FROM member  WHERE Uid01 = '$p_uid01'";
        $result = execute_sql($link, "testdb", $sql);
        
        if (mysqli_num_rows($result) == 1) {

            $row = mysqli_fetch_assoc($result);
            echo '{"state":true,"data":'.json_encode($row).',"message":"驗證成功，已登入"}';

        } else {
            echo '{"state":false,"message":"驗證失敗，未登入"}';
            echo $p_uid01;
        }
        mysqli_close($link);
    } else {
        echo '{"state":false,"message":"欄位不得為空白"}';
    }
} else {
    echo '{"state":false,"message":"欄位錯誤"}';
}
