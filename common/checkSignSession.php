<?php
    // 로그인 하지 않은 경우
    if (!isset($_SESSION['memberID'])) { // 세션 여부 검사
        // 회원가입 또는 로그인 필요
        Header("Location:../index.php"); // 메인페이지로 이동
        exit;
    }
?>