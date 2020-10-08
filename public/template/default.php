<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gabbler</title>
</head>
<body>
<!-- The navigation menu is used for the 'production mode'. Delete later ! -->
<header>
    <ul>
        <li><a href="./">Home.user</a></li>
        <li><a href="?p=profil.user">Profil.user</a></li>
        <li><a href="?p=room.user">Room.user</a></li>
        <li><a href="?p=history.user">history.user</a></li>
        <li><a href="?p=contact.user">Contact.user</a></li>
        <li><a href="?p=home.admin">Home.admin</a></li>
        <li><a href="?p=404">Page.404</a></li>
    </ul>
</header>
    <?= $content ?>


<script src="jquery/jquery-3.5.1.js"></script>
<script src="js/ad.room.user.js"></script>

</body>
</html>