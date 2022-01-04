<?php
include "dbconn.php";

$temp = $_POST['temp'];

$insert = $conn->query("UPDATE temperature SET room_temperature = $temp WHERE user_id = 1");

$data = $conn->query("SELECT * FROM temperature WHERE user_id = 1");
foreach ($data as $row) {}
$limit_temp = $row['my_temp'];


    if ($temp >= $limit_temp) {
        $insert = $conn->query("UPDATE appliance SET appliance.state = 1 WHERE switch_no = 5");
    } else {
        $insert = $conn->query("UPDATE appliance SET appliance.state = 0 WHERE switch_no = 5");
    }
