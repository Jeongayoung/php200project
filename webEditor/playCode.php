<?php
    include $_SERVER['DOCUMENT_ROOT'].'/php200project/common/session.php';
    include $_SERVER['DOCUMENT_ROOT'].'/php200project/common/checkSignSession.php';

    $code = $_POST['code'];

    // 파일명 만들기
    function makeFileName() { // 사용할 수 있는 파일명을 반환하는 함수
        $existsFileList = array(); // 존재하는 파일명 배열
        $opendir = opendir('./codeList'); // 파일이 저장될 공간 codeList 폴더를 연다

        while (($readdir = readdir($opendir))) { // 폴더 codeList에 있는 파일들 파일명 배열에 추가
            array_push($existsFileList, $readdir);
        }

        $isEqualNameCheck = false; // 파일명 중복 여부

        while (true) { // 무한반복
            $fileName = 'php200-'.mt_rand().'.php'; // mt_rand() :: 을 이용해 랜덤 파일명

            foreach ($existsFileList as $efl) {
                if ($existsFileList == $fileName) {
                    $isEqualNameCheck = true; // 중복되면 true로
                }
            }

            if ($isEqualNameCheck == false) {
                return $fileName; // 사용할 수 있는 파일명이므로 return문으로 파일명을 반환하여 함수에서 빠져나옴
            }
        }
    }

    $fileName = makeFileName(); // 함수가 반환한 파일명
    $filePath = $_SERVER['DOCUMENT_ROOT'].'/php200project/webEditor/codeList/'; // 파일을 생성할 폴더의 경로
    $myfile = fopen($filePath.$fileName,"w") or die("파일 열기 실패"); // fopen() :: 함수를 사용해 파일 생성/오픈
    fwrite($myfile,$code); // fwrite() :: 함수 사용하여 code의 값을 파일에 씀
    fclose($myfile); // fclose() :: 함수 사용하여 파일 닫음
    header("Location:./codeList/".$fileName); // 생성한 파일로 이동
?>