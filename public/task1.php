<?php 

require_once $_SERVER['DOCUMENT_ROOT'] . '/config/db.php';

echo '<img src="banner.php"/>';

$views = $db->query("SELECT SUM(`views`) FROM `visitors`")->fetchColumn();
$count = $db->query("SELECT COUNT(DISTINCT `user_ip`) FROM `visitors`")->fetchColumn();

echo '<p>Просмотров:  '. $views . '</p>';
echo '<p>Кол-во уникальных пользователей: ' . $count . '</p>';