<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/php200project/connection/connection.php';

  $selectorList = array();
  $selectorList = ['wrap','header','leftArea','rightArea','footer']; // 속성 값 배열

  foreach($selectorList as $sl) { // selectorList의 별명을 sl로 지정함, sl 배열 수 만큼 반복
    $sql = "INSERT INTO controlCSS (selectorName, floata,";
    $sql .= " width, height, background, marginTop, marginRight,";
    $sql .= "marginBottom, marginLeft) VALUES ";
    $sql .= "('{$sl}','unset',0,0,'',0,0,0,0)"; // selectorName의 값은 배열 sl
    $result = $dbConnect->query($sql); // 쿼리문 실행

    if($result) {
      echo "셀렉터 {$sl} 입력 성공"; // 각 레코드의 입력 여부를 확인
    } else {
      echo "셀렉터 {$sl} 입력 실패";
    }
    echo "<br>";
  }
 ?>
