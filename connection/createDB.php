<?php // MySQL 접속 정보를 각각의 변수에 대입
    $host = "localhost"; // host
    $user = "root"; // 계정명
    $pw = "root"; // 비밀번호
    // mysqli 클래스의 인스턴스 생성, 생성자에 접속 정보 전달
    $dbConnect = new mysqli($host, $user, $pw);
    // 인코딩
    $dbConnect->set_charset("utf8");

    if(mysqli_connect_errno()){
        echo '데이터베이스 접속 실패';
    }else {
        $sql = "CREATE DATABASE php200project"; // 접속 성공 시 데이터베이스 생성 쿼리문
        $res = $dbConnect->query($sql); // 쿼리문 전달, 데이터베이스 생성

        if ( $res ) {
            echo "데이터베이스 생성 완료";
        } else {
            echo "데이터베이스 생성 실패";
        }
    }
?>
