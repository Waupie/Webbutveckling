<?php

$lines = array();
//$lines = array('a', 'b', 'c', 'd', 'e');

$fp = fopen('textfile.txt', 'r');

/*
while(!feof($fp)) {
    $line = fgets($fp);

    $line = trim($line);
    
    $lines[] = $line;
}
fclose($fp);

foreach ($lines as $value) {
    echo "$value <br>";
}
*/



$date = array();
$time = array();
$IPadress = array();
$browser = array();

while (!feof($fp)) {
    $line = fgets($fp);
    $line = trim($line);
    $date[] = $line;

    $line = fgets($fp);
    $line = trim($line);
    $time[] = $line;

    $line = fgets($fp);
    $line = trim($line);
    $IPadress[] = $line;

    $line = fgets($fp);
    $line = trim($line);
    $browser[] = $line;
}

echo '<!DOCTYPE html>
<html lang="se">
<head>
    <title>Display Data</title>
    <meta name="author" content="Maximilian Holm">
    <meta name="description" content="Serversidan PHP">
    <meta name="generator" content="Visual Studio Code">
    <meta name="keywords" content="HTML">
    <meta name="robot" content="index">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/CSS/style.css">
    

    <!-- Gooele font - Raleway -->
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
</head>
<body>';

for ($x = 0; $x < sizeof($date); $x++) {
    //echo "$date[$x] - $time[$x] - $IPadress[$x] - $browser[$x]<br>";
    echo "<table>
        <tr>
            <td>
                $date[$x]
            </td>
            <td>
                $time[$x]
            </td>
            <td>
                $IPadress[$x]
            </td>
            <td>
                $browser[$x]
            </td>
        </tr>
    </table>";


}

echo '</body>
</html>';


/*
echo json_encode($lines);

json_decode($lines);

$x = $lines[1];

echo $x;
*/
?>