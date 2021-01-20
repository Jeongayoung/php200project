<?php
  $host = "localhost"; // 2~5 = 접속 정보 각각의 변수에 대입
  $user = "root";
  $pw = "root";
  $dbName = "php200project";
  $dbConnect = new mysqli($host, $user, $pw, $dbName); // mysqli 인스턴스 생성, 접속 정보 전달
  $dbConnect->set_charset("utf8"); // 인코딩

  if(mysqli_connect_errno()) { // 접속 실패 시
    echo "데이터베이스 접속 실패";
  }
?>
