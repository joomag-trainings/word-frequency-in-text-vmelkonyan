<?php
/**
 * Created by PhpStorm.
 * User: moof
 * Date: 7/9/17
 * Time: 7:28 PM
 */

$text = file('article.txt');
$textString = '';
foreach ($text as $temp) {
    $textString = $textString . " " . $temp;
}
$pos = strpos($textString, " ");

var_dump($pos);
?>


<!DOCTYPE html>
<html>
<head>
    <title>Word Frequency In Text</title>
</head>
<body></body>
</html>

