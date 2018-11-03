<?php

$file = "database.txt"

$barcode = 0
$productcompany = 1;
$producttype = 2;
$productname = 3;
$price = 4;

function appendFileLine($file, $line)
{            
    $data = explode("\n", file_get_contents($file));
    array_push($data, $line);
    file_put_contents($file, implode("\n", $data));
}



?>



