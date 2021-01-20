<?php
    // 전체 레코드 수 구하기!
    $sql = "SELECT count(boardID) FROM board"; // 쿼리 수 구함
    $result = $dbConnect->query($sql); // 쿼리문 실행

    $boardTotalCount = $result->fetch_array(MYSQLI_ASSOC); // 전체 게시글 수
    $boardTotalCount = $boardTotalCount['count(boardID)']; // 왜 다시 대입하지?

    // 총 페이지 수
    $totalPage = ceil($boardTotalCount / $numView); // numView :: 20, 남는 게시물 수의 페이지도 ceil로 올림해서 구한다

    // 처음 페이지 이동 링크
    echo "<a href='./list.php?page=1'>처음</a>&nbsp;"; // page의 값을 1로, get방식 사용

    // 이전 페이지 이동 링크
    if ($page != 1) { // 1인 경우는 이전링크 표시X
        $previousPage = $page - 1; // 현재 페이지 - 1
        echo "<a href='./list.php?page={$previousPage}'>이전</a>";
    }

    // 현재 페이지를 기준으로 앞 뒤로 5개의 페이지까지 표시
    $pageTerm = 5;

    // 현재 페이지 - pageTerm = 처음 페이지 (ex. 현재 8페이지면 3부터 출력됨)
    $startPage = $page - $pageTerm;
    // 음수일 경우 1로 변경 처리
    if ($startPage < 1) {
        $startPage = 1;
    }

    // 현재 페이지 + pageTerm = 마지막 페이지 (ex. 현재 8페이지면 13까지 출력됨)
    $lastPage = $page + $pageTerm;

    // 마지막 페이지의 수보다 클 경우 총 페이지의 수로 변경 처리
    if ($lastPage >= $totalPage) {
        $lastPage = $totalPage;
    }

    for ($i=$startPage; $i<=$lastPage; $i++) { // 시작 ~ 마지막 페이지 출력 조건문
        $nowPageColor = 'unset'; // 현재 페이지의 색, 기본값 unset(값을 정의하지 않음을 의미)
        if($i == $page) { // 현재 페이지의 색 설정
            $nowPageColor = 'hotpink';
        }
        echo "&nbsp<a href='./list.php?page={$i}'";
        echo "style='color:{$nowPageColor}'>{$i}</a>&nbsp";
    }

    // 다음 페이지 이동 링크
    if ($page != $totalPage) { // 현재 페이지와 전체페이지개수(마지막페이지) 같으면 다음 X
        $nextPage = $page + 1;
        echo "<a href='./list.php?page={$nextPage}'>다음</a>";
    }

    // 마지막 페이지 이동 링크
    echo "&nbsp;<a href='./list.php?page={$totalPage}'>끝</a>";
?>