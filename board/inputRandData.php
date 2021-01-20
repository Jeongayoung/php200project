<?php
    include $_SERVER['DOCUMENT_ROOT'].'/php200project/common/session.php'; // session_start()
    include $_SERVER['DOCUMENT_ROOT'].'/php200project/common/checkSignSession.php'; // session check
    include $_SERVER['DOCUMENT_ROOT'].'/php200project/connection/connection.php'; // db connect

    for ($i=1; $i<=165; $i++) {
        $time = time();
        $sql = "INSERT INTO board (memberID, title, content, regTime) ";
        $sql .= "VALUES (1, '{$i}번째 제목', '{$i}번째 내용', {$time})";
        $result = $dbConnect->query($sql);

        if ($result) {
            echo "{$i}번째 데이터 입력 완료";
        } else {
            echo "{$i}번째 데이터 입력 실패";
        }
    }
?>