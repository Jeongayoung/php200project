<?php
    include $_SERVER['DOCUMENT_ROOT'].'/php200project/common/session.php';
    include $_SERVER['DOCUMENT_ROOT'].'/php200project/common/checkSignSession.php';
?>
<!-- 로그인한 사람만 사용할 수 있도록 세션 체크 -->
<!doctype html>
<html>

<head>
    <title>웹코딩 에디터</title>
</head>

<body>
    <h1>실행할 코드를 입력하세요.</h1>
    <form name="webEditor" method="post" action="./playCode.php">
        <textarea name="code" cols="100" rows="30"></textarea>
        <br>
        <input type="submit" value="PLAY CODE" />
    </form>
</body>

</html>