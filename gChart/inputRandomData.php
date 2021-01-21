<?php
    include $_SERVER['DOCUMENT_ROOT'].'/php200project/common/session.php';
    include $_SERVER['DOCUMENT_ROOT'].'/php200project/common/checkSignSession.php';
    include $_SERVER['DOCUMENT_ROOT'].'/php200project/connection/connection.php';

    $kindList = array();
    $kindList = ['offlineStore','onlineStore','website','friends','academy','noMemory','etc'];

    $memberID = 2;

    for ($i=1; $i<=100; $i++) { // 데이터 입력 100회
        $memberID++;
        $kind = $kindList[rand(0,6)]; // kindList의 랜덤값을 kind에 대입
        $time = time(); // regTime에 입력될 값
        $sql = "INSERT INTO survey (memberID,kind,regTime) ";
        $sql .= "VALUES ({$memberID},'{$kind}',{$time})";
        $dbConnect->query($sql);
    }
?>