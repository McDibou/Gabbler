<?php
session_start();
define('THE_ROOT', dirname(__DIR__));

require_once THE_ROOT . DIRECTORY_SEPARATOR . 'bin' . DIRECTORY_SEPARATOR . 'config.php';
require_once THE_ROOT . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'connectToDB.model.php';
require_once THE_ROOT . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'user' . DIRECTORY_SEPARATOR . 'ad.room.controller.php';

$db = connectToDB();
$session = $_SESSION;

if (isset($_POST['task']) && ctype_alpha($_POST['task'])) {
    $task = htmlspecialchars($_POST['task']);
}

if ($task === 'show') {
    showControllerMessage($db);
}

if ($task === 'insert') {
    insertControllerMessage($db, $session);
}

if ($task === 'lastId') {
    lastIdControllerMesssage($db);
}