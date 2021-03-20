<?php
function kode_random_beli($length)
{
    $data = "1234567890";
    $string = "BL-";

    for ($i = 0; $i < $length; $i++) {
        $pos = rand(0, strlen($data) - 1);
        $string .= $data[$pos];
    }
    return $string;
}

$kodebl = kode_random_beli(10);
