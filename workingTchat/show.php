<?php
include "config.php";


if (!empty($_POST['getId'])) {

    $getId = $_POST['getId'];

    $sql = "SELECT * FROM `message` JOIN `user` ON `id_user` = `fkey_user_id` WHERE id_message > '$getId' ORDER BY `date_message` ASC";
    $rq = mysqli_query($db, $sql);
    $result = mysqli_fetch_all($rq, MYSQLI_ASSOC);

    echo $json = json_encode($result);

} else {

    $sql = "SELECT * FROM `message` JOIN `user` ON `id_user` = `fkey_user_id` ORDER BY `date_message` ASC";
    $rq = mysqli_query($db, $sql);
    $result = mysqli_fetch_all($rq, MYSQLI_ASSOC);

    echo $json = json_encode($result);

}

