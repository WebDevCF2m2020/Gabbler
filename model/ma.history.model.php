<?php
//model

// message number in all rooms
function countAllMsg($db){

    $sql = "SELECT COUNT(id_message) as nbMsg FROM message";
    $query = mysqli_query($db,$sql) or die (mysqli_error($db));
    $data = mysqli_fetch_assoc($query);
    $nbMsg = $data['nbMsg'];
    return  $nbMsg;
}

// select messages with pagination
function messagesHistoryWithPagination($db,$begin,$end){
    $begin = (int) $begin;
    $end = (int) $end;

    $sql = "SELECT * FROM `message` 
             JOIN `user`
             ON `id_user` = `fkey_user_id`
             JOIN `room`
             ON `id_room` = `fkey_room_id`
             ORDER BY `nickname_user` ASC LIMIT $begin,$end;";

    $query = mysqli_query($db, $sql) or die(mysqli_error($db));
    return mysqli_fetch_all($query,MYSQLI_ASSOC);
}
