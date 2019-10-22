<?php

include 'Logik/counter.php';
include 'Logik/browserData.php';

$html = file_get_contents('../HTML/home.html');
$html = str_replace('<meta http-equiv="REFRESH" content="0; URL=/PHP/home.php">',
                        "",
                        $html);
$html = str_replace('---$hits---', $visits, $html);

echo $html;


?>

