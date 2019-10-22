<?php
// Läser in HTML-filen som mall
$html = file_get_contents('../HTML/displayData.html');

// Tar bort refresh så att sidan inte fortsätter göra en refresh
$html = str_replace('<meta http-equiv="REFRESH" content="0; URL=/PHP/displayData.php">',
                    "",
                    $html);

// Gör en array för varje värde jag vill spara, dvs: datum, tid, IP-adress och webbläsare
$date = array();
$time = array();
$IPadress = array();
$browser = array();

// Delar upp sidan i 3 delar:
// En del innan första <!--===xxx===--> markören,
// en del mellan första och andra <!--===xxx===--> markören,
// och en sista del efter den andra <!--===xxx===--> markören.
$html_pieces = explode("<!--===xxx===-->", $html);
print_r ($html_pieces[0]);

// Läser in filen med alla loggar
$fp = fopen('textfile.txt', 'r');

// Låser filen åt personen som använder filen
if (flock($fp, LOCK_EX)) {
    // En while-loop som läser in info för varje rad och sparar till en array
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
} else {
    echo "Error locking file!";
}
fclose($fp);

// En for-loop som går igenom hur många som har loggats och sedan skriver upp på dom webbsidan
for ($x = 0; $x < sizeof($date); $x++) {
    echo "<tr>
            <td>$date[$x]</td>
            <td>$time[$x]</td>
            <td>$IPadress[$x]</td>
            <td>$browser[$x]</td>
        </tr>";
}

// Skriver ut sista delen av HTML-koden efter <!--===xxx===--> markören
print_r ($html_pieces[2]);

?>