<?php

$host = 'localhost';
$user = 'root';
$pass = 'root';
$dbname = 'test-task';

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    
    return $db;
} catch (\Throwable $th) {
    $log = date('Y-m-d H:i:s') . ' ' . 'Database load error: ' . $th;
    file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/public/logs/log.txt', $log . PHP_EOL, FILE_APPEND);
}