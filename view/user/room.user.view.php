<?php

require_once dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'ad.room.user.controller.php';

?>

<div>
    <?php while ($content = mysqli_fetch_assoc($room)) { ?>
        <a href
           onclick="ad_roomUser(<?= $content['id_room'] ?>)"><?= $content['name_room'] ?></a>
    <?php } ?>
</div>

<div id="tchat"></div>

<div>
    <?php if (!empty($_GET['key_room']) && ctype_digit($_GET['key_room'])) { ?>

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