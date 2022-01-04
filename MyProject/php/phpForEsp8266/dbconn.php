<?php
    $conn = new mysqli ('localhost', 'root', '', 'has');
    $tz_obj = new DateTimeZone("Africa/Nairobi");
    $now = new DateTime('now', $tz_obj);