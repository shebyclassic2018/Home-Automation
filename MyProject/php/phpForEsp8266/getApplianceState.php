<?php
    include "dbconn.php";

    $select = $conn->query("SELECT * FROM appliance a, schedule s WHERE a.id = s.app_id");

    $arr = array();
    $row = 0;
    $number_of_rows = mysqli_num_rows($select);
    foreach($select as $app) {

        $snow = $app['shr'];
        $enow = $app['smin'];
        $arr[$row][] = $app['pin'];
        $arr[$row][] = $app['state'];
        $arr[$row][] = $number_of_rows;
        $arr[$row][] = $snow;
        $arr[$row][] = $enow;
        $arr[$row][] = $app['ehr'];
        $arr[$row][] = $app['emin'];
        $arr[$row][] = $app['sync'];
        $arr[$row][] = $app['period'];
        $row++;

    }
    echo json_encode($arr); 