<?php

include "config.php";

if (!empty($_POST['content_message'])) {

    $text = $_POST['content_message'];

    mysqli_query($db, "INSERT INTO `message` (`content_message`, `archived_message`, `fkey_user_id`, `fkey_room_id`) VALUES ('$text', 0, 5, 1)");

    $id = mysqli_insert_id($db);

    $sql = "SELECT * FROM `message` JOIN `user` ON `id_user` = `fkey_user_id` WHERE `id_message` = '$id' ORDER BY `date_message` ASC";
    $rq = mysqli_query($db, $sql);
    $result = mysqli_fetch_all($rq, MYSQLI_ASSOC);

    echo $json = json_encode($result);

}
