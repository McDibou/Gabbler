<?php

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'ad.room.user.model.php';

$ad_keyRoom = isset($_GET['key_room']) ? $_GET['key_room'] : null;
$message = ad_readMessage($db, $ad_keyRoom);

$room = ad_readRoom($db);

if (isset($_POST['insertMessage'])) {

    $ad_contentMessage = $_POST['content_message'];

    if (!empty($ad_contentMessage) && !empty($ad_keyRoom)) {
        ad_insertMessage($db, $ad_contentMessage, $ad_keyRoom);
    }

}
