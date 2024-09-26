<?php
$data = file_get_contents("php://input", "r");
// {"memberId":"aaa","productId":"bbb","userName":"ccc","tel":"ddd","email":"eee","adult":"fff","child":"ggg","remark":"hhh"}
$mydata = array();
$mydata = json_decode($data, true);

// 檢查所有必要欄位是否存在且不為空
if(isset($mydata["memberId"]) && isset($mydata["productId"]) && isset($mydata["userName"]) && isset($mydata["tel"]) && isset($mydata["email"]) && isset($mydata["adult"])  && isset($mydata["remark"])){
    if($mydata["memberId"] != "" && $mydata["productId"] != "" && $mydata["userName"] != "" && $mydata["tel"] != "" && $mydata["email"] != "" && $mydata["adult"] != ""  && $mydata["remark"] != ""){
        
        // 將資料指派給變數
        $p_memberId = $mydata["memberId"];
        $p_productId = $mydata["productId"];
        $p_userName = $mydata["userName"];
        $p_tel = $mydata["tel"];
        $p_email = $mydata["email"];
        $p_adult = $mydata["adult"];
        $p_child = $mydata["child"];
        $p_remark = $mydata["remark"];
        
        // 資料庫連線資訊
        $servername = "localhost";
        $username = "owner";
        $password = "123456";
        $dbname = "testdb";
        
        // 建立資料庫連線
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("連線失敗" . mysqli_connect_error());
        }
        
        // 插入資料的 SQL 語句
        $sql = "INSERT INTO plan_order (memberId, productId, userName, tel, email, adult,  remark) VALUES ('$p_memberId', '$p_productId', '$p_userName', '$p_tel', '$p_email', '$p_adult',  '$p_remark')";
        
        // 執行 SQL 並回傳結果
        if (mysqli_query($conn, $sql)) {
            echo '{"state":true,"message":"新增成功"}';
        } else {
            echo '{"state":false,"message":"新增失敗: ' . $sql . ' - ' . mysqli_error($conn) . '"}';
        }
        
        // 關閉資料庫連線
        mysqli_close($conn);
    } else {
        echo '{"state":false,"message":"欄位不得為空白"}';
    }
} else {
    echo '{"state":false,"message":"欄位錯誤"}';
}
?>
