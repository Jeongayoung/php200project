<?php
    include $_SERVER['DOCUMENT_ROOT'].'/php200project/connection/connection.php';

    $sql = "SELECT * FROM controlCSS"; // 1. controlCSS 테이블의 데이터를 모두 불러온다
    $result = $dbConnect->query($sql); // 2. 4의 쿼리문 실행
    $dataCount = $result->num_rows; // 3. 결과값 result의 열 갯수를 dataCount에 대입

    $cssSelectorList = array(); // array cssSelectorList 선언

    for($i=0; $i<$dataCount; $i++) { // 열 갯수를 조건으로 삼는 for문을 이용
        $cssData = $result->fetch_array(MYSQLI_ASSOC); // cssData에 result 한 행씩 저장하여
        array_push($cssSelectorList, $cssData); // array cssSelectorList에 push
    }

    $floatList = array();
    $floatList = ['left','right','none','unset']; // 배열 floatList 선언& float 값 저장

    $boarderWidthList = array(); // border 두께값 배열 선언
    $borderWidthList = range(1,10); // range 함수 사용하여 1~10 배열에 저장
?>
<!doctype html>
<html>

<head>
    <style>
    /* form 태그를 감싸는 span에 style 주기 */
    span {
        float: left;
        margin-left: 10px;
        padding: 10px;
        border: 1px solid black;
    }
    </style> <!-- float : 흐름, margin-left : 왼쪽여백, padding : 안쪽여백, border : 외곽선 -->
</head>

<body>
    <h1>CSS CONTROL PANEL</h1> <!-- 제목 -->
    <br>
    <?php
    foreach($cssSelectorList as $csl) { // cssSelectorList 배열의 수만큼 반복문
?>
    <span>
        <h2><?=$csl['selectorName']?></h2> <!-- selectorName 인덱스 값 출력 -->
        <form name="wrap" method="post" action="./controlPanelSave.php">
            <h3>흐름</h3> <!-- controlPanelSave는 입력한 css 속성의 값을 저장하는 기능, 후에 구현-->
            <select name="float">
                <?php
    foreach ($floatList as $fl) { // floatList 배열 값으로 option 태그 생성
        $isChecked = '';
        if($fl == $csl['floata']) {
            $isChecked = 'selected'; // fl과 csl 인덱스 floata 값이 같으면 isChecked에 selected를 대입
        }
        echo "<option value='{$fl}' $isChecked>{$fl}</option>"; // 선택된 속성값을 저장하는 option 태그
    }
?>
            </select>
            <h3>가로길이</h3>
            <input type="number" name="width" value="<?=$csl['width']?>" />px
            <br>
            <h3>세로길이</h3>
            <input type="number" name="height" value="<?=$csl['height']?>" />px
            <br>
            <h3>배경색</h3>
            <input type="color" name="background" value="<?=$csl['background']?>" />
            <br>
            <h3>바깥여백</h3>
            위
            <br>
            <input type="number" name="marginTop" value="<?=$csl['marginTop']?>" />px
            <br><br>
            오른쪽
            <br>
            <input type="number" name="marginRight" value="<?=$csl['marginRight']?>" />px
            <br><br>
            아래
            <br>
            <input type="number" name="marginBottom" value="<?=$csl['marginBottom']?>" />px
            <br><br>
            왼쪽
            <br>
            <input type="number" name="marginLeft" value="<?=$csl['marginLeft']?>" />px
            <br><br>
            <input type="hidden" name="selectorName" value="<?=$csl['selectorName']?>" />
            <input type="submit" value="<?=$csl['selectorName']?> 적용" />
        </form>
    </span>
    <?php
    }
    ?>
</body>

</html>