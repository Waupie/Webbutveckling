<?php
include 'counter.php';
include 'browserData.php';

$html = file_get_contents('home.html');
$html = str_replace('<meta http-equiv="REFRESH" content="0; URL=home.php">',
                        "",
                        $html);
$html = str_replace('---$hits---', $visits, $html);

echo $html;
?>

