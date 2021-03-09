<?php

require_once THE_ROOT . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'ad.room.model.php';


function showControllerMessage($db)
{

    $getId = (!empty($_POST['getId'])) ? $_POST['getId'] : 0;

    $result = showMessage($getId, $db);

    echo $json = json_encode($result);

}

function insertControllerMessage($db, $session)
{

    if (isset($_POST['content_message'])) {

        $user = $session['user']['id_user'];
        $room = 1; // $room = $_GET['room'];
        $text = htmlspecialchars(trim($_POST['content_message']));

        if (ctype_digit($user) && !empty($text)) {
            $result = insertMessage($text, $db, $user, $room);
            echo $json = json_encode($result);
        }

    }
}

function lastIdControllerMesssage($db)
{
    echo $result = lastIdMessage($db);
}