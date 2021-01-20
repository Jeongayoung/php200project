<?php
    include $_SERVER['DOCUMENT_ROOT'].'/php200project/connection/connection.php';
    // 데이터베이스 접속 파일 include
    $sql = "CREATE TABLE member ("; // member 테이블 생성 쿼리문
    $sql .= "memberID int(10) unsigned NOT NULL AUTO_INCREMENT,";
    $sql .= "email varchar(40) UNIQUE NOT NULL,";
    $sql .= "nickname varchar(10) NOT NULL,";
    $sql .= "pw varchar(40) DEFAULT NULL,";
    $sql .= "birthday varchar(10) NOT NULL,";
    $sql .= "regTime int(11) NOT NULL,";
    $sql .= "PRIMARY KEY (memberID)";
    $sql .= ") CHARSET=utf8";

    $res = $dbConnect->query($sql); // 쿼리문 실행

    if($res) { //  생성 여부 확인
        echo "테이블 생성 완료";
    } else {
        echo "테이블 생성 실패";
    }
?>