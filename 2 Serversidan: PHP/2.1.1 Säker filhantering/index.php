<?php
header('Content-type: text/plain');

// Om filen inte finns så skapas filen i den här
if (!file_exists("counter.txt")) {
    $file = fopen("counter.txt", "w");
    // Låser filen åt personen som använder den
    if (flock($file, LOCK_EX)) {
        fwrite($file, "0");
        // Släpper låset på filen
        flock($file, LOCK_UN);
    } else {
        echo "Error locking file!";
    }
    fclose($file);
}


$file = fopen("counter.txt", "r");

// Låser filen åt personen som använder den
if (flock($file, LOCK_EX)) {
    $visits = fread($file, filesize("counter.txt"));
    $visits++;
    $file = fopen("counter.txt", "w");
    fwrite($file, $visits);
    // Släpper låset på filen
    flock($file, LOCK_UN);
} else {
    echo "Error locking file!";
}
fclose($file);


echo "$visits har besökt hemsidan";

?>
