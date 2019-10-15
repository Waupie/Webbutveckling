<?php

header('Content-type: text/plain');

$file_name = "textfile.txt";

// Om filen inte finns så skapas filen i den här
if (!file_exists($file_name)) {
    $file = fopen($file_name, "w");
    fclose($file);
}

$file = fopen($file_name, "r");

// Låser filen åt personen som använder den
if (flock($file, LOCK_EX)) {
    $added_data = fread($file, filesize($file_name));
    // Här skriver du vad du vill spara i filen
    $file = fopen($file_name, "w");
    fwrite($file, "Datum:       " . date("Y/m/d\n"));
    fwrite($file, "Tid:         " . date("h:i:sa\n"));
    fwrite($file, "IP-adress:   " . $_SERVER['REMOTE_ADDR'] . "\n");
    fwrite($file, "Webbläsare:  " . $_SERVER['HTTP_USER_AGENT'] . "\n\n");
    fwrite($file, $added_data);
    // Släpper låset på filen
    flock($file, LOCK_UN);
} else {
    echo "Error locking file!";
}
fclose($file);

echo $added_data;

?>