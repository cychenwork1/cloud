<?php
$data = file_get_contents("php://input", "r");
// {"name":"aaa","price":"bbb","num":"ccc","remark":"ddd"}
$mydata = array();
$mydata = json_decode($data, true);

if(isset( $mydata["name"]) && isset( $mydata["location"]) && isset( $mydata["d_date"])  && isset( $mydata["days"]) && isset( $mydata["price"]) && isset( $mydata["num"]) && isset( $mydata["remark"]) ){
    if($mydata["name"]!="" && $mydata["location"]!="" && $mydata["d_date"]!="" && $mydata["days"]!="" && $mydata["price"]!="" && $mydata["num"]!="" && $mydata["remark"]!="" ){



        $p_name = $mydata["name"];
        $p_location = $mydata["location"];
        $p_d_date = $mydata["d_date"];
        $p_days = $mydata["days"];
        $p_price =  $mydata["price"];
        $p_num = $mydata["num"];
        $p_remark = $mydata["remark"];
        
        
        
        $servername = "localhost";
        $username = "owner";
        $password = "123456";
        $dbname = "testdb";
        
        
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            // echo "連線失敗";
            die("連線失敗" . mysqli_connect_error());
        }
        
        $sql = "INSERT INTO product(Name,Location,D_Date,Days,Price,Num,Remark) VALUES('$p_name','$p_location','$p_d_date','$p_days','$p_price','$p_num','$p_remark') ";
        if (mysqli_query($conn, $sql)) {
            echo '{"state":true,"message":"新增成功"}';
        } else {
            echo '{"state":false,"message":"新增失敗' . $sql . mysqli_error($conn) . '"}';
            // echo "新增失敗" . $sql . mysqli_error($conn);
        }
        mysqli_close($conn);
        }else{
        echo '{"state":false,"message":"欄位不得為空白"}';
        }
        
}else{
    echo '{"state":false,"message":"欄位錯誤"}';
}
