<?php
$data = file_get_contents("php://input", "r");
$mydata = array();
$mydata = json_decode($data, true);

// echo $mydata["Id"];

if (isset($mydata["id"])) {
    if ($mydata["id"] != "") {
        $p_id = $mydata["id"];

        $p_name = $_POST["name"];
        $p_price = $_POST["price"];
        $p_num = $_POST["num"];
        $p_remark = $_POST["remark"];



        $servername = "localhost";
        $username = "owner";
        $password = "123456";
        $dbname = "testdb";


        $conn = mysqli_connect($servername, $username, $password, $dbname);

        if (!$conn) {
            // echo "連線失敗";
            die("連線失敗" . mysqli_connect_error());
        }

        $sql = "DELETE FROM product WHERE Id = '$p_id'";



        if (mysqli_query($conn, $sql)) {

            if (mysqli_affected_rows($conn) == 1) {
                echo '{"state":true,"message":"刪除成功"}';
            } else {
                echo '{"state":true,"message":"刪除失敗，id不存在"}';
            }

        } else {
            echo '{"state":false,"message":"刪除失敗' . $sql . mysqli_error($conn) . '"}';
            // echo "新增失敗" . $sql . mysqli_error($conn);
        }
        mysqli_close($conn);
    } else {
        echo '{"state":false,"message":"欄位不得為空白"}';
    }
} else {
    echo '{"state":false,"message":"欄位命名錯誤"}';
}
