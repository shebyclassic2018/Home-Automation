<?php
    include "../dbconn.php";
    $min = $now->format("i");
    $hr = $now->format("H");

    $arr[] = $hr;
    $arr[] = $min;

    echo json_encode($arr);