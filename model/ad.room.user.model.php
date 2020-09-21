<?php


function ad_readMessage($db, $room)
{
    return mysqli_query($db, "
SELECT * FROM `message`
JOIN `user`
ON `id_user` = `fkey_user_id`
JOIN `room`
ON `id_room` = `fkey_room_id`
WHERE `id_room` = '$room'
AND `archived_message` = 0
ORDER BY date_message ASC
");

}

// replace 5 = $SESSION['id_user']
function ad_insertMessage($db, $content_message, $room_id, $user_id = 5)
{
    return mysqli_query($db, "
   INSERT INTO `message` (`content_message`, `archived_message`, `fkey_user_id`, `fkey_room_id`) 
   VALUES (
   '$content_message', 
   0,
   (SELECT `id_user` FROM `user` WHERE `id_user` = $user_id),
   (SELECT `id_room` FROM `room` WHERE `id_room` = '$room_id') 
   )
    ");
}

function ad_readRoom ($db) {
    return mysqli_query($db, "
    SELECT * FROM `room`
    ");
}