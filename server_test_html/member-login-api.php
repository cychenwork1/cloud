<?php
//{"username":"owner01",password":"123456","email":"owner@test.com"}

$data = file_get_contents("php://input", "r");
$mydata = array();
$mydata = json_decode($data, true);


if (isset($mydata["username"]) && isset($mydata["password"])) {
    if ($mydata["username"] != "" && $mydata["password"] != "") {
        $p_username = $mydata["username"];
        $p_password = $mydata["password"];

        require_once("dbtools.php");
        $link = create_connection();
        //確認帳號
        //確認密碼
        $sql = "SELECT Username, Password FROM member WHERE Username = '$p_username'";
        $result = execute_sql($link, "testdb", $sql);
        if (mysqli_num_rows($result) == 1) {
            //帳號存在比對密碼
            $row = mysqli_fetch_assoc($result);
            if (password_verify("$p_password", $row["Password"])) {
                //密碼正確產生uid更新至資料庫
                $uid01=substr(hash("sha256",uniqid(time())),0,8) ;
                $sql ="UPDATE member SET Uid01 = '$uid01' WHERE Username = '$p_username'";
                if(execute_sql($link, "testdb", $sql)){
                    //uid更新成功
                    
                $sql = "SELECT ID,Username,Email,Uid01,Created_at,Active,Level  FROM member WHERE Username = '$p_username'";
                $result = execute_sql($link, "testdb", $sql);
                $row = mysqli_fetch_assoc($result);



                echo '{"state":true,"data":'.json_encode($row).',"message":"登入成功"}';
                }else{
                    //uid更新失敗
                    echo '{"state":false,"message":"uid01錯誤"}';

                }
                



            } else {
                echo '{"state":false,"message":"帳號或密碼錯誤"}';
            }
        } else {
            //帳號不存在
            echo '{"state":false,"message":"帳號或密碼錯誤"}';
        }



        mysqli_close($link);
    } else {
        echo '{"state":false,"message":"欄位不得為空白"}';
    }
} else {
    echo '{"state":false,"message":"欄位錯誤"}';
}
