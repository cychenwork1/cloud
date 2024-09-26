<?php
//{"username":"owner01",password":"123456","email":"owner@test.com"}

$data = file_get_contents("php://input", "r");
$mydata = array();
$mydata = json_decode($data, true);


if (isset($mydata["username"])) {
    if ($mydata["username"] != "") {
        $p_username = $mydata["username"];



        require_once("dbtools.php");
        $link = create_connection();


        $check_sql= "SELECT username FROM member  WHERE Username = '$p_username'";
        $check_result = execute_sql($link, "testdb", $check_sql);
        
        if (mysqli_num_rows($check_result) == 0) {

            echo '{"state":true,"message":"帳號不存在，可以使用"}';
        } else {
            echo '{"state":false,"message":"帳號存在，不可以使用"}';
        }
        mysqli_close($link);
    } else {
        echo '{"state":false,"message":"欄位不得為空白"}';
    }
} else {
    echo '{"state":false,"message":"欄位錯誤"}';
}
