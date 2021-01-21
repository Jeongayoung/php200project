<?php
    include $_SERVER['DOCUMENT_ROOT'].'/php200project/common/session.php';
    include $_SERVER['DOCUMENT_ROOT'].'/php200project/common/checkSignSession.php';
    include $_SERVER['DOCUMENT_ROOT'].'/php200project/connection/connection.php';

    $sql = "SELECT kind FROM survey";
    $result = $dbConnect->query($sql);

    if ($result) {
        $surveyDataCount = $result->num_rows; // surveyDataCount :: 레코드 수

        $offlineStore = 0;
        $onlineStore = 0;
        $website = 0;
        $friends = 0;
        $academy = 0;
        $noMemory = 0;
        $etc = 0;

        if ($surveyDataCount > 0) {
            for ($i=0; $i<$surveyDataCount; $i++) { // 레코드 수만큼 반복문 작동
                $surveyData = $result->fetch_array(MYSQLI_ASSOC);

                switch ($surveyData['kind']) { // kind 필드값을 분류하여 각 변수에 1씩 더함
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

            echo json_encode ( // 집계된 데이터를 JSON으로 변환된 값을 출력
                array (
                    'result' => 'ok',
                    'offlineStore' => $offlineStore,
                    'onlineStore' => $onlineStore,
                    'website' => $website,
                    'friends' => $friends,
                    'academy' => $academy,
                    'noMemory' => $noMemory,
                    'etc' => $etc,
                )
            );
        } else { // dataCount == 0 일때 즉 데이터 없을때
            echo json_encode (
                array (
                    'result' => 'noData'
                )
            );
        }
    } else { // error일 때
        echo json_encode (
            array (
                'result' => 'error'
            )
        );
    }
?>