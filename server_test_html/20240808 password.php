<?php
//時間戳記
echo "time:".time();
echo"<br>";
echo "date:".date("Ymdhis");
echo"<br>";

//md5
echo "md5:".md5('123456');
echo"<br>";

//nuiqid
echo "uniqid:".uniqid();
echo"<br>";
echo "uniqid time():".uniqid(time());
echo"<br>";

//hash
echo "md5:".hash("md5",time());
echo"<br>";
echo "sha256:".hash("sha256",time());
echo"<br>";
echo "sha512:".hash("sha512",time());
echo"<br>";

//password_hash(密碼, 演算法)
echo "password_hash 123456:".password_hash("123456",PASSWORD_DEFAULT);
echo"<br>";
//
$hash01='$2y$10$eFEE/MTHIl95NR7ysHh1vOwwblI/Q6IPCLUFkgtfPU793M6xou.bO';
if(password_verify("123456",$hash01)){
    echo "密碼正確";
}else{
    echo "密碼錯誤";
}

echo"<br>";
if(password_verify("123457",$hash01)){
    echo "密碼正確";
}else{
    echo "密碼錯誤";
}

echo"<br>";
//產生uid01
echo "uid01:".substr(hash("sha256",uniqid(time())),0,8) ;


?>

