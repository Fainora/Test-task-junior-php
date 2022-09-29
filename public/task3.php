<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/config/db.php';

$sql = "SELECT `name`, COUNT(`books`.`id`) AS `count`
FROM `books`, `author_books` AS `ab`
WHERE `books`.`id` = `ab`.`book_id`
GROUP BY `books`.`id`
HAVING `count` = 3";

$response = $db->query($sql)->fetchAll();

foreach($response as $row) {
    echo $row['name'] . ' - ' . $row['count'] . '<br>';
}