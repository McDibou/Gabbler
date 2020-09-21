<?php

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'ad.room.user.model.php';

if (isset($_POST['insertMessage'])) {
    ad_insertMessage($db, $_POST['content_message'], $_GET['key_room']);
}
