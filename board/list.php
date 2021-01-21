<?php
    include $_SERVER['DOCUMENT_ROOT'].'/php200project/common/session.php'; // session_start
    include $_SERVER['DOCUMENT_ROOT'].'/php200project/common/checkSignSession.php'; // session check
    include $_SERVER['DOCUMENT_ROOT'].'/php200project/connection/connection.php'; // db connect
?>

<!DOCTYPE html>
<html>

<head>
    <title>게시물 목록</title>
</head>

<body>
    <a href="./writeForm.php">글작성하기</a>
    <a href="../signIn/signOut.php">로그아웃</a>
    <table>
        <thead>
            <th>번호</th>
            <th>제목</th>
            <th>작성자</th>
            <th>게시일</th>
        </thead>
        <tbody>
            <?php
    if (isset($_GET['page'])) { // page :: 쪽수, Get 방식으로 전달 / 없으면 1
        $page = (int) $_GET['page'];
    } else {
        $page = 1;
    }

    $numView = 20; // 출력할 게시물의 수 20
    $firstLimitValue = ($numView * $page) - $numView; // LIMIT문의 첫번째 값, page가 1일땐 LIMIT 0,20

    $sql = "SELECT b.boardID, b.title, m.nickname, b.regTime FROM board b ";
    $sql .= "JOIN member m ON (b.memberID = m.memberID) ORDER BY boardID "; // member,board 테이블 조인
    $sql .= "DESC LIMIT {$firstLimitValue}, {$numView}";
    $result = $dbConnect->query($sql);

    if ($result) {
        $dataCount = $result->num_rows;

        if ($dataCount > 0) { // 게시글이 있으면
            for ($i=0; $i<$dataCount; $i++) {
                $memberInfo = $result->fetch_array(MYSQLI_ASSOC);
                echo "<tr>";
                echo "<td>".$memberInfo['boardID']."</td>";
                echo "<td><a href='/php200project/board/view.php?boardID=";
                echo "{$memberInfo['boardID']}'>";
                echo $memberInfo['title'];
                echo "</a></td>";
                echo "<td>{$memberInfo['nickname']}</td>";
                echo "<td>".date('Y-m-d H:i', $memberInfo['regTime'])."</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>게시글이 없습니다.</td></tr>";
        }
    }
?>
        </tbody>
    </table>

    <?php
    include $_SERVER['DOCUMENT_ROOT'].'/php200project/board/nextPageLink.php'; // 다음페이지
    include $_SERVER['DOCUMENT_ROOT'].'/php200project/board/searchForm.php'; // 검색 페이지
?>
</body>

</html>