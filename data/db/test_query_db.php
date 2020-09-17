<?php

define("DB_HOST", "localhost");
define("DB_PORT", 3308);
define("DB_NAME", "gabbler");
define("DB_LOGIN", "root");
define("DB_PWD", "");
define("DB_CHARSET", "utf8");

$db = mysqli_connect(DB_HOST, DB_LOGIN, DB_PWD, DB_NAME, DB_PORT);


$user = mysqli_fetch_assoc(mysqli_query($db, '
SELECT * FROM `user` 
JOIN `user_right` 
ON `id_user` = `fkey_user_id` 
JOIN `status` 
ON `fkey_status_id` = `id_status` 
JOIN `role_has_user` 
ON `id_user` = `role_has_user_id_user` 
JOIN `role` 
ON `role_has_user_id_role` = `id_role` 
JOIN `user_has_img`
ON `id_user` = `user_has_img_id_user`
JOIN `img`
ON `user_has_img_id_img` = `id_img`
JOIN `online`
ON `id_user` = `fkey_user`
'));
echo '<pre>';
echo 'user : ';
var_dump($user);
echo '</pre>';

$message = mysqli_fetch_assoc(mysqli_query($db, '
SELECT * FROM `message`
JOIN `user`
ON `id_user` = `fkey_user_id`
JOIN `room`
ON `id_room` = `fkey_room_id`
'));
echo '<pre>';
echo 'message : ';
var_dump($message);
echo '</pre>';

$reported = mysqli_fetch_assoc(mysqli_query($db, '
SELECT * FROM `reported`
JOIN `category`
ON `id_category` = `fkey_category_id`
JOIN `message`
ON `id_message` = `fkey_message_id`
'));
echo '<pre>';
echo 'reported : ';
var_dump($reported);
echo '</pre>';

$room = mysqli_fetch_assoc(mysqli_query($db, '
SELECT * FROM `room`
JOIN `user_room`
ON `id_room` = `fkey_room_id`
JOIN `user`
ON `id_user` = `fkey_user_id`
'));
echo '<pre>';
echo 'room : ';
var_dump($room);
echo '</pre>';

$help = mysqli_fetch_assoc(mysqli_query($db, 'SELECT * FROM `help`'));
echo '<pre>';
echo 'help : ';
var_dump($help);
echo '</pre>';

