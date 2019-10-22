<?php

//header('Content-type: text/plain');

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
    fwrite($file, date("Y/m/d\n"));
    fwrite($file, date("h:i:sa\n"));
    fwrite($file, $_SERVER['REMOTE_ADDR'] . "\n");
    fwrite($file, $_SERVER['HTTP_USER_AGENT'] . "\n");
    fwrite($file, $added_data);
    // Släpper låset på filen
    flock($file, LOCK_UN);
} else {
    echo "Error locking file!";
}
fclose($file);

// Här är den senaste som sedan sparas i filen,
// men visas inte förän nästa gång man laddar om sidan,
// därför skrivs det senaste ut direkt

/*
 * REMOVE COMMENT FROM ROW 39-47 TO DISPLAY IN BROWSER
 * 
echo "Detta är din webbläsare och IP-adress:\n";
echo "****************************************************************************************************************\n";
echo "Datum:       " . date("Y/m/d\n");
echo "Tid:         " . date("h:i:sa\n");
echo "IP-adress:   " . $_SERVER['REMOTE_ADDR'] . "\n";
echo "Webbläsare:  " . $_SERVER['HTTP_USER_AGENT'] . "\n";
echo "****************************************************************************************************************\n\n";

echo $added_data;
*/
?>