<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/config/db.php';

$ip = $_SERVER['REMOTE_ADDR'];
$date = date("Y-m-d");
$datetime = date("Y-m-d H:i:s");

$res = $db->query("SELECT `user_ip` FROM `visitors` WHERE DATE_FORMAT( `last_date` , '%Y-%m-%d' ) = '$date'");

if($res->rowCount() === 0) {
    $db->query("INSERT INTO `visitors` (`user_ip`, `last_date`, `views`) VALUES ('".$ip."', '".$datetime."', '1')");
} else {
    $db->query("UPDATE `visitors` SET 
        `last_date` = '$datetime', 
        `views` = `views` + 1 
        WHERE `user_ip` = '$ip' AND DATE_FORMAT( `last_date` , '%Y-%m-%d' ) = '$date'");
}

header("Content-Type: image/jpeg");
//header ("X-Accel-Redirect: image/banner.jpeg");
readfile('image/banner.jpeg'); 