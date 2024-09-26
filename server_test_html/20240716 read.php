<?php
$servername = "localhost";
$username = "owner";
$password = "123456";
$dbname = "testdb";


$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    // echo "連線失敗";
    die("連線失敗" . mysqli_connect_error());
}

$sql = "SELECT * FROM product";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // $row = mysqli_fetch_assoc($result);
    // echo "Id=".$row["Id"]."Name=".$row["Name"];

    // $row = mysqli_fetch_assoc($result);
    // echo "Id=".$row["Id"]."Name=".$row["Name"];
    // $row = mysqli_fetch_assoc($result);
    // echo "Id=".$row["Id"]."Name=".$row["Name"];
    // $row = mysqli_fetch_assoc($result);
    // echo "Id=".$row["Id"]."Name=".$row["Name"];
    // $row = mysqli_fetch_assoc($result);
    // echo "Id=".$row["Id"]."Name=".$row["Name"];
    // $row = mysqli_fetch_assoc($result);
    // echo "Id=".$row["Id"]."Name=".$row["Name"];
    // $row = mysqli_fetch_assoc($result);
    // echo "Id=".$row["Id"]."Name=".$row["Name"];
    // $row = mysqli_fetch_assoc($result);
    // echo "Id=".$row["Id"]."Name=".$row["Name"];

    $mydata = array();
    while ($row = mysqli_fetch_assoc($result)) {
        // echo "Id=" . $row["Id"] . "Name=" . $row("Name");
        $mydata[] = $row;
    }

    echo json_encode($mydata);
} else {
    echo "查無資料";
}
mysqli_close($conn);
