<?php

//Database variables

//Localhost
/*
$db_host = 'localhost';
$db_name = 'msports';
$db_user = 'admin';
$db_password = 'admin1admin2';
*/
//ofunibuz

$db_host = '';
$db_name = '';
$db_user = '';
$db_password = '';

try {
  $pdo = new PDO("mysql:host={$db_host};dbname={$db_name}", $db_user, $db_password, array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
  ));

  $sql = "CREATE TABLE IF NOT EXISTS `messages` (
    `id` INT NOT NULL AUTO_INCREMENT ,
    `name` VARCHAR(1023) NOT NULL ,
    `email` VARCHAR(1023) NOT NULL ,
    `phone` VARCHAR(1023) NOT NULL ,
    `message` VARCHAR(1023) NOT NULL,
    `timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
    PRIMARY KEY (`id`)
    ) ENGINE = InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci";

  $pdo->exec($sql);
} catch (PDOException $e) {
  die("Connection to Database failed!!");
}
