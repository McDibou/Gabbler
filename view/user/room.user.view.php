<?php

require_once dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'ad.room.user.model.php';
require_once dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'ad.room.user.controller.php';

$getRoom = isset($_GET['key_room']) ? $_GET['key_room'] : null;
$message = ad_readMessage($db, $getRoom);

$room = ad_readRoom($db)

?>
<div>

    <?php while ($content = mysqli_fetch_assoc($room)) { ?>
    <a href
       onclick="event.preventDefault(); location+='&key_room=<?= $content['id_room'] ?>';"><?= $content['name_room'] ?></a>

    <?php } ?>
</div>

<div>

    <?php if (isset($_GET['key_room'])) { ?>

        <?php while ($content = mysqli_fetch_assoc($message)) { ?>

            <div style="border: 1px solid white; width: 200px; margin: 5px; background-color: grey; ">
                <h1><?= $content['nickname_user'] ?></h1>
                <p><?= $content['content_message'] ?></p>
                <em><?= $content['date_message'] ?></em>
            </div>

        <?php } ?>

        <form method="post">

            <textarea type="text" name="content_message" required></textarea>
            <button type="submit" name="insertMessage">SEND</button>

        </form>

    <?php } else { ?>

        <div>SELECT ROOM</div>

    <?php } ?>
</div>