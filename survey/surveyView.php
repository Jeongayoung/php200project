<?php
    include $_SERVER['DOCUMENT_ROOT'].'/php200project/common/session.php';
    include $_SERVER['DOCUMENT_ROOT'].'/php200project/common/checkSignSession.php';
    include $_SERVER['DOCUMENT_ROOT'].'/php200project/connection/connection.php';

    $sql = "SELECT kind FROM survey";
    $result = $dbConnect->query($sql);

    if ($result) {
        $surveyDataCount = $result->num_rows; // survey 테이블 행 개수

        $offlineStore = 0;
        $onlineStore = 0;
        $website = 0;
        $friends = 0;
        $academy = 0;
        $noMemory = 0;
        $etc = 0;

        if ($surveyDataCount > 0) { // 데이터 개수가 0보다 크면
            for ($i=0; $i<$surveyDataCount; $i++) {
                $surveyData = $result->fetch_array(MYSQLI_ASSOC);

                switch ($surveyData['kind']) { // kind 필드 값을 분류하여 각각 변수에 1씩 더함
                    case 'offlineStore':
                        $offlineStore++;
                        break;
                    case 'onlineStore':
                        $onlineStore++;
                        break;
                    case 'website':
                        $website++;
                        break;
                    case 'friends':
                        $friends++;
                        break;
                    case 'academy':
                        $academy++;
                        break;
                    case 'noMemory':
                        $noMemory++;
                        break;
                    case 'etc':
                        $etc++;
                        break;
                }
            }
        } else {
            echo "데이터가 없습니다.";
            exit;
        }
    } else {
        echo "에러 발생 - 관리자에게 문의";
        exit;
    }
?>
<!doctype html>
<html>

<head>
</head>

<body>
    <h1>설문조사 프로그램 - 결과</h1>
    <h2>당신은 어떤 경로로 본서를 알게 되셨나요?</h2>
    <h3>총 참여 인원 : <?=$surveyDataCount?></h3>
    <hr>
    오프라인 서점 - <?=$offlineStore?>명<br><br>
    온라인 서점 - <?=$onlineStore?>명<br><br>
    웹사이트 - <?=$website?>명<br><br>
    지인을 통해서 - <?=$friends?>명<br><br>
    교육기관 - <?=$academy?>명<br><br>
    기억이 안남 - <?=$noMemory?>명<br><br>
    기타 - <?=$etc?>명
</body>

</html>