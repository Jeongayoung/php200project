<?php
    include $_SERVER['DOCUMENT_ROOT'].'/php200project/common/session.php'; // session_start()
    include $_SERVER['DOCUMENT_ROOT'].'/php200project/common/checkSignSession.php'; // session check
    include $_SERVER['DOCUMENT_ROOT'].'/php200project/connection/connection.php'; // db connect

    $title = $_POST['title'];
    $content = $_POST['content'];

    if ($title != null && $title != '') { // 제목 공백 확인
        $title = $dbConnect->real_escape_string($title); // real_escape_string() :: 특문 오류 방지
    } else {
        echo "제목을 입력하세요.";
        echo "<a href='./writeForm.php'>작성 페이지로 이동</a>";
        exit;
    }

    if ($content != null && $content != '') { // 내용 공백 확인
        $content = $dbConnect->real_escape_string($content); // 특문
    } else {
        echo "내용을 입력하세요.";
        echo "<a href='./writeForm.php'>작성 페이지로 이동</a>";
        exit;
    }

    $memberID = $_SESSION['memberID'];

    $regTime = time(); // 게시물 입력 시간

    $sql = "INSERT INTO board (memberID, title, content, regTime) ";
    $sql .= "VALUES ({$memberID},'{$title}','{$content}',{$regTime})";
    $result = $dbConnect->query($sql); // insert문 실행

    if ($result) { // 결과 확인
        echo "저장 완료";
        echo "<a href='./list.php'>게시글 목록으로 이동</a>";
        exit;
    } else {
        echo "저장 실패 - 관리자에게 문의";
        echo "<a href='./list.php'>게시글 목록으로 이동</a>";
        exit;
    }
?>