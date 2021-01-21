<?php
    include $_SERVER['DOCUMENT_ROOT'].'/php200project/common/session.php'; // session_start()
    include $_SERVER['DOCUMENT_ROOT'].'/php200project/common/checkSignSession.php'; // session check
    include $_SERVER['DOCUMENT_ROOT'].'/php200project/connection/connection.php'; // db connect

    if (isset($_GET['boardID']) && (int) $_GET['boardID'] > 0) { // $_GET['boardID'] 가 존재하는지, 0을 초과하는지 여부 확인
        $boardID = $_GET['boardID']; // boardID에 대입
        $sql = "SELECT b.title, b.content, m.nickname, b.regTime FROM board b ";
        $sql .= "JOIN member m ON (b.memberID = m.memberID) ";
        $sql .= "WHERE b.boardID = {$boardID}"; // memberID 조인, boardID로 검색하여 게시글 정보 가져옴
        $result = $dbConnect->query($sql); // 쿼리문 실행

        if ($result) {
            $contentInfo = $result->fetch_array(MYSQLI_ASSOC); // 게시글 정보 행 단위로 저장하여 
            echo "제목: ".$contentInfo['title']."<br>"; // 제목 출력
            echo "작성자: ".$contentInfo['nickname']."<br>"; // 닉네임 출력
            // $regDate = date("Y-m-d h:i");
            // echo "게시일: {$regDate}<br><br>";
            echo "게시일: ".date("Y-m-d h:i", $contentInfo['regTime'])."<br><br>";
            echo "내용 <br>";
            echo $contentInfo['content'].'<br>'; // 내용 출력
            echo "<a href='/php200project/board/list.php'>목록으로 이동</a>";
        } else {
            echo "잘못된 접근입니다.";
            exit;
        }
    } else {
        echo "잘못된 접근입니다.";
        exit;
    }
?>