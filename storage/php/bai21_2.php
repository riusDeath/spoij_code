<?php

function main($mang) {
    $sophantu = count($mang);

    for ($i = 0; $i < $sophantu - 1; $i++)
    {
        $min = $i;
        for ($j = $i + 1; $j < $sophantu; $j++){
            if ($mang[$j] < $mang[$min]){
                $min = $j;
            }
        }
        $temp = $mang[$i];
        $mang[$i] = $mang[$min];
        $mang[$min] = $temp;
    }
    return implode("", $mang);
}

?>

