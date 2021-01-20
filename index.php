<?php // session.php :: sessionStart() 코드 사용
    include $_SERVER['DOCUMENT_ROOT'].'/php200project/common/session.php';
?>
<!DOCTYPE html>
<html>

<head>
</head>

<body>
    <?php
    if (!isset($_SESSION['memberID'])) { // 로그인 실패 시, 즉 생성된 세션 없을 시
?>
    <a href="signUp/signUpForm.php">회원가입</a> <!-- 회원가입 창 -->
    <br>
    <a href="signIn/signInForm.php">로그인</a> <!-- 로그인 창 -->
    <?php
    } else { // 로그인 성공하여 생성된 세션 있을 시 메뉴 표시
?>
    <a href="board/list.php">게시판</a>
    <br>
    <a href="survey/surveyForm.php">설문조사 프로그램</a>
    <br>
    <a href="gChart/surveyResultBarChart.php">투표결과 바차트로 보기</a>
    <br>
    <a href="gChart/surveyResultPieChart.php">투표결과 파이차트로 보기</a>
    <br>
    <a href="webEditor/editorForm.php">간단한 코딩 에디터</a>
    <br>
    <a href="parsing/selectForm.php">실시간 검색어 1위 키워드 보기</a>
    <br>
    <a href="signIn/signOut.php">로그아웃</a>
    <?php
    }
?>
</body>

</html>