<?php
    include $_SERVER['DOCUMENT_ROOT'].'/php200project/common/session.php'; // 세션 생성
    include $_SERVER['DOCUMENT_ROOT'].'/php200project/connection/connection.php'; // db 접속

    $email = $_POST['userEmail']; // 이메일
    $pw = $_POST['userPw']; // 비번

    function goSignInPage($alert) { // 로그인 정보 유효X 할때 문구 출력, 로그인 폼으로 이동
        echo $alert.'<br>';
        echo "<a href='./signInForm.php'>로그인 폼으로 이동</a>";
        return;
    }

    // 유효성, 이메일 검사
    if (!filter_Var($email, FILTER_VALIDATE_EMAIL)) {
        goSignInPage('올바른 이메일이 아닙니다.');
        exit;
    }

    // 비밀번호 검사
    if ($pw == null || $pw == '') {
        goSignInPage('비밀번호를 입력해 주세요.');
        exit;
    }

    $pw = sha1('php200'.$pw); // 입력받은 비밀번호를 암호화

    $sql = "SELECT email, nickName, memberID FROM member ";
    $sql .= "WHERE email = '{$email}' AND pw = '{$pw}'"; // 이메일/pw가 모두 일치하는 레코드를 찾는다
    $result = $dbConnect->query($sql); // 쿼리문 실행

    if ($result) {
        if ($result->num_rows == 0) { // 레코드 없음
            goSignInPage('로그인 정보가 일치하지 않습니다.');
            exit;
        } else { // 레코드 있음
            $memberInfo = $result->fetch_array(MYSQLI_ASSOC); // 결과의 한 행을 저장
            $_SESSION['memberID'] = $memberInfo['memberID']; // memberID를 세션에 저장
            $_SESSION['nickName'] = $memberInfo['nickname']; // nickname을 세션에 저장
            Header("Location:../index.php"); // 메인 페이지로 이동
        }
    }
?>