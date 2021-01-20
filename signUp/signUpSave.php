<?php
    include $_SERVER['DOCUMENT_ROOT'].'/php200project/common/session.php'; // 세션 생성 파일
    include $_SERVER['DOCUMENT_ROOT'].'/php200project/connection/connection.php'; // 데이터 접속 파일

    $email = $_POST['userEmail'];
    $nickName = $_POST['userNickName'];
    $pw = $_POST['userPw'];
    $birthYear = (int) $_POST['birthYear']; // (int) :: 정수형으로 형변환, 다른 값은 0으로 변경됨
    $birthMonth = (int) $_POST['birthMonth'];
    $birthDay = (int) $_POST['birthDay'];

    function goSignUpPage($alert) { // 전달받은 값이 적합하지 않을 때 사용하는 함수,
        echo $alert.'<br>'; // 파라미터로 알림 문구를 받아서 출력함
        echo "<a href='./signUpForm.php'>회원가입 폼으로 이동</a>"; // 회원가입 창으로 이동
        return;
    }

    // 유효성 검사, 이메일 검사
    if (!filter_Var($email, FILTER_VALIDATE_EMAIL)) {
        goSignUpPage('올바른 이메일이 아닙니다.');
        exit;
    }

    // 한글로 구성되어 있는지 정규식 검사
    $nickNameRegPattern = '/^[가-힣]{1,}$/';
    if (!preg_match($nickNameRegPattern, $nickName, $matches)) {
        goSignUpPage('닉네임은 한글로만 입력해 주세요.');
        exit;
    }

    // 비밀번호 검사
    if($pw == null || $pw == '') { // 공백 확인
        goSignUpPage('비밀번호를 입력해 주세요.');
        exit;
    }
    // 비번 이상 없으면
    $pw = sha1('php200'.$pw); // sha1() :: 문자열 암호화하는 함수

    // 생년 검사
    if ($birthYear == 0) {
        goSignUpPage('생년을 정확히 입력해 주세요.');
        exit;
    }

    // 생월 검사
    if ($birthMonth == 0) {
        goSignUpPage('생월을 정확히 입력해 주세요.');
        exit;
    }

    // 생일 검사
    if ($birthDay == 0) {
        goSignUpPage('생일을 정확히 입력해 주세요.');
        exit;
    }
    // 생년월일 값 이상없으면 birth에 yyyy-mm-dd 형태로 대입
    $birth = $birthYear.'-'.$birthMonth.'-'.$birthDay;

    // 이메일 중복 검사
    $isEmailCheck = false;

    $sql = "SELECT email FROM member WHERE email = '{$email}'"; // 이메일 존재하는지 검색
    $result = $dbConnect->query($sql); // 쿼리문 실행하여 결과값 result에 저장

    if($result) {
        $count = $result->num_rows; // 행 갯수
        if($count == 0) { // 결과 없으면 true
            $isEmailCheck = true;
        } else { // 있으면 false, goSignUpPage 함수 사용
            goSignUpPage('이미 존재하는 이메일입니다.');
            exit;
        }
    } else {
        echo "에러발생 : 관리자 문의 요망";
        exit;
    }

    // 닉네임 중복 검사
    $isNickNameCheck = false;

    $sql = "SELECT nickName FROM member WHERE nickname = '{$nickName}'"; // 닉네임 검색
    $result = $dbConnect->query($sql);

    if ($result) {
        $count = $result->num_rows; // 행 갯수
        if($count == 0) { // 결과 없으면 true
            $isNickNameCheck = true;
        } else { // 있으면 false, goSignUpPage 함수 사용
            goSignUpPage('이미 존재하는 닉네임 입니다.');
            exit;
        }
    } else {
        echo "에러발생 : 관리자 문의 요망";
        exit;
    }

    if ($isEmailCheck == true && $isNickNameCheck == true) {
        $regTime = time();
        $sql = "INSERT INTO member(email, nickname, pw, birthday, regTime)";
        $sql .= "VALUES('{$email}','{$nickName}','{$pw}',";
        $sql .= "'{$birth}',{$regTime})";
        $result = $dbConnect->query($sql); // member 테이블에 데이터 입력

        if ($result) { // 성공 시
            $_SESSION['memberID'] = $dbConnect->insert_id; // 세션 생성, primary key(memberID)의 값
            $_SESSION['nickName'] = $nickName; // 세션 생성
            Header("Location:../index.php"); // 메인 페이지로 이동
        } else {
            echo '회원가입 실패 - 관리자에게 문의';
            exit;
        }
    } else {
        goSignUpPage('이메일 또는 닉네임이 중복값입니다.');
        exit;
    }
?>