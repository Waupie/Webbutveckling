<?php
// Laddar om sidan varje sekund
header("Refresh:1");

// Höjd och bredd på bild
$width = 210;
$height = 80;

// Skapar bilden
$image = ImageCreate($width, $height); 

// Skapar två färger, vit och grå
$white = ImageColorAllocate($image, 255, 255, 255);
$grey = ImageColorAllocate($image, 100, 100, 100);

// Gör bakgrunden i bilden grå
ImageFill($image, 0, 0, $grey);

// Skapar en sträng med datum och tid
ImageString($image, 30, 10, 30, date("Y/m/d") . " " . date("h:i:sa"), $white);

// Säger till webbläsaren vad för typ av fil som kommer in
header("Content-Type: image/jpeg"); 

// Gör den nyskapade bilden i jpeg format
ImageJpeg($image);

ImageDestroy($image);

?>
