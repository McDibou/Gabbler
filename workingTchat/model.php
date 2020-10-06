<?php


function showMessage($id, $db)
{
    $sql = "SELECT * FROM `message` JOIN `user` ON `id_user` = `fkey_user_id` WHERE id_message > '$id' ORDER BY `date_message` ASC";
    $rq = mysqli_query($db, $sql);
    return mysqli_fetch_all($rq, MYSQLI_ASSOC);
}


function insertMessage($content, $db)
{
    mysqli_query($db, "INSERT INTO `message` (`content_message`, `archived_message`, `fkey_user_id`, `fkey_room_id`) VALUES ('$content', 0, 5, 1)");

    $id = mysqli_insert_id($db);

    $sql = "SELECT * FROM `message` JOIN `user` ON `id_user` = `fkey_user_id` WHERE `id_message` = '$id'";
    $rq = mysqli_query($db, $sql);
    return mysqli_fetch_all($rq, MYSQLI_ASSOC);
}


function lastIdMessage($db)
{
    $sql = "SELECT `id_message` FROM `message`ORDER BY `date_message` DESC LIMIT 1";
    $rq = mysqli_query($db, $sql);
    return mysqli_fetch_assoc($rq)['id_message'];
}