<?php
    include "../dbconn.php";
    $select = $conn->query("SELECT * FROM schedule");
    

    $arr = array();
    $row = 0;
    foreach ($select as $sch) {
        $arr[$row][] = $sch['starting'];
        $arr[$row][] = $sch['end'];
        $arr[$row][] = $sch['app_id'];
        $arr[$row][] = $sch['sync'];
        $arr[$row][] = $sch['period'];
        $row++;
    }

    echo json_encode($arr);