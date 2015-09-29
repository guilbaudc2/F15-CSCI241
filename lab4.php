<?php

$start = 1;
$end = 100;
for($r = $start; $r <= $end; $r++)
{
    for($c = $start; $c <= $end; $c++ )
    {
        echo $r*$c;
    }
    echo "<br>";
}

