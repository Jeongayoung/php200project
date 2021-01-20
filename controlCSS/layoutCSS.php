<?php
  header("Content-type: text/css"); // content-type을 css로 인식하도록 하기위함

  include_once $_SERVER['DOCUMENT_ROOT'].'/php200project/connection/connection.php';

  $sql = "SELECT * FROM controlCSS"; // controlCSS 테이블의 값을 불러온다
  $result = $dbConnect->query($sql); // 쿼리문 실행

  $dataCount = $result->num_rows; // 데이터의 수(num_rows)를 변수 dataCount에 대입

  $cssSource = ''; // css 코드를 담는 변수 선언

  for($i=0; $i<$dataCount; $i++) { // for문, 조건값 dateCount, CSS 코드 대입
    $cssInfo = $result->fetch_array(MYSQLI_ASSOC);
    $cssSource .= "#".$cssInfo['selectorName']."{";
    $cssSource .= "float:".$cssInfo['floata'].";";
    $cssSource .= "width:".$cssInfo['width']."px;";
    $cssSource .= "height:".$cssInfo['height']."px;";
    $cssSource .= "background:".$cssInfo['background'].";";
    $cssSource .= "margin-top:".$cssInfo['marginTop']."px;";
    $cssSource .= "margin-right:".$cssInfo['marginRight']."px;";
    $cssSource .= "margin-bottom:".$cssInfo['marginBottom']."px;";
    $cssSource .= "margin-left:".$cssInfo['marginLeft']."px;";
    $cssSource .= "}";
  }

  echo $cssSource; // CSS 코드 출력
 ?>
