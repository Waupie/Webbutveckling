<?php
/*
    $fh = fopen('textfile.txt');

    $date = array();
    $time = array();
    $IPadress = array();
    $browser = array();


    while (!feof($fp)) {
        $line = fgets($fp);
        $date[] = $line;

        $line = fgets($fp);
        $time[] = $line;

        $line = fgets($fp);
        $IPadress[] = $line;

        $line = fgets($fp);
        $browser[] = $line;
    }
    fclose($fh);

    foreach ($date as $value) {
        echo "$value<br>";
    }
    echo 'End of date-array';
    foreach ($time as $value) {
        echo "$value<br>";
    }
    echo 'End of time-array';
    foreach ($IPadress as $value) {
        echo "$value<br>";
    }
    echo 'End of IP-adress-array';
    foreach ($browser as $value) {
        echo "$value<br>";
    }
    echo 'End of browser-array';
*/

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
    $date[] = $line;

    $line = fgets($fp);
    $time[] = $line;

    $line = fgets($fp);
    $IPadress[] = $line;

    $line = fgets($fp);
    $browser[] = $line;
}
fclose($fp);

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
<body>
    <table>
        <tr>
            <th>Datum</th>
            <th>Tid</th>
            <th>IP adress</th>
            <th>browser</th>
        </tr>
        <tr>
            <td>Datum</td>
            <td>Tid</td>
            <td>IP adress</td>
            <td>browser</td>
        </tr>';

for ($x = 0; $x < sizeof($date); $x++) {
    //echo "$date[$x] - $time[$x] - $IPadress[$x] - $browser[$x]<br>";
    echo "<tr>
            <td>$date[$x]</td>
            <td>$time[$x]</td>
            <td>$IPadress[$x]</td>
            <td>$browser[$x]</td>
        </tr>";


}

echo '</table>
</body>
</html>';

?>