<?php
// Находим дубликаты и их кол-во
$sql = "SELECT `name`,
    COUNT(`name`) AS `count`
    FROM `clients`
    GROUP BY `name`
    HAVING `count` > 1";
    