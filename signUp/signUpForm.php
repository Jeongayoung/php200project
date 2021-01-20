<!DOCTYPE html>
<html>

<head>
    <title>회원가입 폼 만들기</title>
</head>

<body>
    <h1>회원가입</h1>
    <form name="signUp" method="post" action="./signUpSave.php">
        <!--signUpSave.php :: 회원가입 정보를 member 테이블에 저장-->
        이메일<br>
        <input type="email" name="userEmail" required />
        <br>
        <br>
        닉네임<br>
        <input type="text" name="userNickName" required />
        <br>
        <br>
        비밀번호<br>
        <input type="password" name="userPw" required />
        <br>
        <br>
        생일<br>
        <select name="birthYear" required>
            <!-- 년도 선택 -->
            <?php
    $thisYear = date('Y', time()); // 현재 년도 구함
    for ($i=$thisYear; $i>=1930; $i--) { // 1930~현재 년도까지 option 태그 생성
        echo "<option value='{$i}'>{$i}</option>";
    }
?>
        </select>년
        <select name="birthMonth" required>
            <!-- 월 선택 -->
            <?php
    for ($i=1; $i<=12; $i++) {
        echo "<option value='{$i}'>{$i}</option>";
    }
?>
        </select>월
        <select name="birthDay" required>
            <!-- 일 선택 -->
            <?php
    for ($i=1; $i<=31; $i++) {
        echo "<option value='{$i}'>{$i}</option>";
    }
?>
        </select>일
        <br>
        <br>
        <input type="submit" value="가입하기" /> <!-- action 속성 값으로 전송 -->
    </form>
</body>

</html>