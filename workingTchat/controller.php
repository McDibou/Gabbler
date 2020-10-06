<?php
include "config.php";
include "model.php";
session_start();
var_dump($_SESSION);

if (isset($_POST['task'])) {
    $task = $_POST['task'];
}


if ($task === 'show') {
    
    $getId = (!empty($_POST['getId'])) ? $_POST['getId'] : 0;

    $result = showMessage($getId , $db);

    echo $json = json_encode($result);
}


if ($task === 'insert') {

    if (!empty($_POST['content_message'])) {

        $text = $_POST['content_message'];

        $result = insertMessage($text, $db);

        echo $json = json_encode($result);

    }
}


if ($task === 'lastId') {

    echo $result = lastIdMessage($db);

}