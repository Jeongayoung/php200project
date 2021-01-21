<!DOCTYPE html>
<html>

<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <!-- 구글 차트 라이브러리 불러오는 코드, src로 js파일 불러온다 -->
    <script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart', 'bar']
    }); /* 어떤 차트 사용할 지 명시 */
    google.charts.setOnLoadCallback(drawChart); /* drawChart함수를 argument로 사용 */

    function drawChart() {
        /* 차트에 표시할 데이터와 옵션값을 지정하는 역할 */
        var data = google.visualization.arrayToDataTable([
            ['종류', '수'], /* 첫번째 :: 출력할 값의 필드명 */
            ['오프라인 서점', 10], /* 두번째 부터 :: 실제 출력될 데이터 */
            ['온라인 서점', 50], /* '레이블명', '수치데이터' */
        ]);

        var options = {
            /* 제목, 사이즈 등의 옵션 지정 */
            title: '제목',
            chartArea: {
                width: '80%'
            },
            hAxis: {
                title: '명',
                minValue: 0
            },
            vAxis: {
                title: '경로'
            }
        };

        var chart = new google.visualization.BarChart(document.getElementById(
            'chart_div')); // id가 chart_div인 태그를 barchart로 만들수있게함
        chart.draw(data, options); // data와 option값으로 차트를 그린다
    }
    </script>
</head>

<body>
    <div id="chart_div"></div> <!-- 차트 표시 -->
</body>

</html>