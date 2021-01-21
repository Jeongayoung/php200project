<?php
    include $_SERVER['DOCUMENT_ROOT'].'/php200project/common/session.php';
    include $_SERVER['DOCUMENT_ROOT'].'/php200project/common/checkSignSession.php';
?>
<!-- 비로그인 상태에서의 접근 차단 -->
<!doctype html>
<html>

<head>
    <title>설문조사 프로그램</title>
</head>

<body>
    <h1>설문조사 프로그램</h1>
    <h2>당신은 어떤 경로로 본서를 알게 되셨나요?</h2>
    <form name="survey" method="post" action="./surveySave.php">
        <input type="radio" name="surveyKind" value="offlineStore" required />
        오프라인 서점
        <!-- radio :: name 속성 값 같으면 하나만 required 적용하면 전체적으로 적용됨 -->
        <br>
        <input type="radio" name="surveyKind" value="onlineStore" />
        온라인 서점
        <br>
        <input type="radio" name="surveyKind" value="website" />
        웹사이트
        <br>
        <input type="radio" name="surveyKind" value="friends" />
        지인을 통해서
        <br>
        <input type="radio" name="surveyKind" value="academy" />
        교육기관
        <br>
        <input type="radio" name="surveyKind" value="noMemory" />
        기억이 안남
        <br>
        <input type="radio" name="surveyKind" value="etc" />
        기타
        <br>
        <input type="submit" value="제출" />
    </form>
</body>

</html>