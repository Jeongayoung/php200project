<?php
    include $_SERVER['DOCUMENT_ROOT'].'/php200project/common/session.php'; // 세션 사용 파일
    unset($_SESSION['memberID']); // memberID 세션 삭제
    unset($_SESSION['nickName']); // nickName 세션 삭제
    echo "로그아웃 되었습니다.";
    echo "<a href='/php200project/index.php'>메인으로 이동</a>"; // 이동 링크
?>