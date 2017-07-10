<?php
/**
 * Created by PhpStorm.
 * User: moof
 * Date: 7/9/17
 * Time: 7:28 PM
 */

$text = file_get_contents('article.txt');
$infoArr;

$text = preg_split('/[,.\s;]+/', $text);
$text = array_map('strtolower', $text);

for ($i = 0; $i < sizeof($text); $i++) {
    $count = 0;
    for ($k = 0; $k < sizeof($text); $k++) {
        if (strcasecmp($text[$i], $text[$k]) === 0) {
            $count++;
            if ($i !== $k) {
                array_splice($text, $k, 1);
            }
            $infoArr[$i][0] = $text[$i];
            $infoArr[$i][1] = $count;
        }
    }
}


?>


<!DOCTYPE html>
<html>
<head>
    <title>Word Frequency In Text</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

        google.charts.load('current', {'packages': ['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Number');
            data.addColumn('number', 'Words');
            data.addRows([
                <?php foreach ($infoArr as $temp) {
                echo "['" . $temp[0] . '\',' . $temp[1] . '], ';
            }   ?>
            ]);

            var options = {
                'title': 'Word Frequency in Text',
                'width': 1000,
                'height': 2400
            };

            var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>


</head>
<body>
    <div id="chart_div"></div>


</body>
</html>

