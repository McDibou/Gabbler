<?php

// SESSION START
session_start();

// THE_ROOT's project
define('THE_ROOT', dirname(__DIR__));

// Common's dependencies
require_once THE_ROOT . DIRECTORY_SEPARATOR . 'bin' . DIRECTORY_SEPARATOR . 'config.php';
require_once THE_ROOT . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'connectToDB.model.php';


ob_start();

// DB Connection
$db = connectToDB();

// IF THE USER IS CONNECTED
if(isset($_SESSION['session_id'])&&$_SESSION['session_id'] === session_id()){

    // IF HE IS AN ADMIN
    if(isset($_SESSION['role'])&&$_SESSION['role']==3){
        require_once THE_ROOT . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'admin.controller.php';

        // IF HE IS AN SIMPLE USER
    }else{
        require_once THE_ROOT . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'user.controller.php';
    }


// IF IS NOT CONNECTED
}else{

    require_once THE_ROOT . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'public.controller.php';
}