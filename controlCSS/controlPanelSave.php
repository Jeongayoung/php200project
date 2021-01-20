<?php
    include $_SERVER['DOCUMENT_ROOT'].'/php200project/connection/connection.php';

    $selectorName = $_POST['selectorName']; // input-hidden 값을 selectorName에 대입
    // selectorName으로 검색하여 레코드의 값을 업데이트 하기 위함
    if($selectorName == '') { // 공백일 경우
        echo '값을 입력하세요.';
    } else { // 공백이 아닐 경우 전달받은 값 변수에 대입
        $float = $_POST['float'];
        $width = (int) $_POST['width'];
        $height = (int) $_POST['height'];
        $background = $_POST['background'];

        $marginTop = (int) $_POST['marginTop'];
        $marginRight = (int) $_POST['marginRight'];
        $marginBottom = (int) $_POST['marginBottom'];
        $marginLeft = (int) $_POST['marginLeft'];

        // selectorName으로 검색해서 일치하는 레코드의 각 필드의 값 업데이트하는 쿼리문
        $sql = "UPDATE controlCSS SET floata = '{$float}',";
        $sql .= " width = '{$width}', height = '{$height}',";
        $sql .= "background = '{$background}', marginTop = '{$marginTop}',";
        $sql .= "marginRight = '{$marginRight}', marginBottom = '{$marginBottom}',";
        $sql .= "marginLeft = '{$marginLeft}' WHERE selectorName = '{$selectorName}'";
        $result = $dbConnect->query($sql); // 쿼리문 실행

        if($result) { // 결과 확인
            echo '변경 완료';
        } else {
            echo '실패';
        }
    }

    echo '<br>';
    echo "<a href='./index.php'>CSS 디자인 페이지로 이동</a>";
    echo '<br>';
    echo "<a href='./controlPanel.php'>CSS 컨트롤 페이지로 이동</a>";
?>