<!DOCTYPE html>
<html>

<head>
</head>

<body>
    <h1>로그인</h1>
    <form name="signIn" method="post" action="signInProcessing.php">
        <!--action에 이메일 처리 파일-->
        이메일<br>
        <input type="email" name="userEmail" required />
        <!--이메일 주소 입력폼-->
        <br>
        <br>
        비밀번호<br>
        <input type="password" name="userPw" required />
        <!--비밀번호 입력폼-->
        <br>
        <br>
        <input type="submit" value="로그인" />
        <!--데이터 전송 버튼-->
    </form>
</body>

</html>