<?php
//{"username":"owner01",password":"123456","email":"owner@test.com"}

$data = file_get_contents("php://input", "r");
$mydata = array();
$mydata = json_decode($data, true);


if (isset($mydata["username"]) && isset($mydata["password"]) && isset($mydata["email"])) {
    if ($mydata["username"] != "" && $mydata["password"] != "" && $mydata["email"] != "" ) {
        $p_username = $mydata["username"];
        $p_password =password_hash($mydata["password"],PASSWORD_DEFAULT);
        $p_email = $mydata["email"];

        // 選填欄位，如果不存在則設置為空字串
        $p_fav_read = isset($mydata["fav_read"]) ? $mydata["fav_read"] : "";
        $p_fav_ball = isset($mydata["fav_ball"]) ? $mydata["fav_ball"] : "";
        $p_fav_movie = isset($mydata["fav_movie"]) ? $mydata["fav_movie"] : "";
        $p_fav_climb = isset($mydata["fav_climb"]) ? $mydata["fav_climb"] : "";
        $p_fav_shopping = isset($mydata["fav_shopping"]) ? $mydata["fav_shopping"] : "";

        



        require_once("dbtools.php");
        $link = create_connection();


        // $sql = "INSERT INTO member(username,password,email) VALUES('$p_username','$p_password','$p_email')";
        $sql = "INSERT INTO member(username,password,email,fav_read,fav_ball,fav_movie,fav_climb,fav_shopping) VALUES('$p_username','$p_password','$p_email','$p_fav_read','$p_fav_ball','$p_fav_movie','$p_fav_climb','$p_fav_shopping')";
        if (execute_sql($link, "testdb2", $sql)) {
            echo '{"state":true,"message":"註冊成功"}';
        } else {
            echo '{"state":false,"message":"註冊失敗和錯誤代碼等"}';
        }
        mysqli_close($link);
    } else {
        echo '{"state":false,"message":"欄位不得為空白"}';
    }
} else {
    echo '{"state":false,"message":"欄位錯誤"}';
}
