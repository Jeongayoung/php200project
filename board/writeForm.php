<?php
    include $_SERVER['DOCUMENT_ROOT'].'/php200project/common/session.php'; // session_start()
    include $_SERVER['DOCUMENT_ROOT'].'/php200project/common/checkSignSession.php'; // session 없으면 메인으로
    error_reporting(E_ALL);

ini_set("display_errors", 1);
?>
<!DOCTYPE html>
<html>

<head>
</head>

<body>
    <form name="boardWrite" method="post" action="saveBoard.php">
        제목
        <br>
        <br>
        <input type="text" name="title" required />
        <br>
        <br>
        내용
        <br>
        <br>
        <textarea name="content" cols="80" rows="10" required></textarea>
        <br>
        <br>
        <input type="submit" value="저장" />
    </form>
</body>

</html>