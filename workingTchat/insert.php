<?php

include "config.php";

$text = $_POST['content_message'];

mysqli_query($db, "
   INSERT INTO 
   `message` 
   (`content_message`, `archived_message`, `fkey_user_id`, `fkey_room_id`) 
   VALUES ('$text', 0, 5, 1)
    ");

