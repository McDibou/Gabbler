<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tchat</title>
</head>
<body>

<div id="tchat"></div>

<div id="test">
    <form action="insert.php" method="post">
        <input type="text" id="content_message" required>
        <input type="button" value="post" id="post">
    </form>
</div>

<script src="js/jquery-3.5.1.js"></script>

<script>

    let interval = setInterval(dynamicTchat, 2000)

    let div = $('#tchat');

    $.post('show.php')

        .done(function (data) {

            let message = JSON.parse(data)
            readMessage(message)

        })


    function dynamicTchat() {

        $.post('show.php')

            .done(function (data) {

                let message = JSON.parse(data)

                let idShow = $('#tchat #id_message').last().val();
                let lastId = message[message.length - 1].id_message;

                if (idShow === undefined) {

                    readMessage(message)

                } else if (idShow !== lastId) {

                    $.post('show.php', {getId: idShow})

                        .done(function (data) {

                            let newMessage = JSON.parse(data)

                            readMessage(newMessage)

                        })

                } else {

                    return true

                }

            })

    }

    function readMessage(message) {

        let html = message.map(function (messages) {

            return `
                    <div style="background-color: #f0ffff; padding: 20px;margin: 5px;">
                        <input type="hidden" id='id_message' value='${messages.id_message}'/>
                        <p>${messages.nickname_user}</p>
                        <p>${messages.content_message}</p>
                        <em>${messages.date_message}</em>
                    </div>
            `

        }).join('')

        div.append(html)

    }


    $('#post').click(function () {

        let content_message = $('#content_message')

        $.post('insert.php', {
            content_message: content_message.val()
        })

            .done(function (data) {

                let message = JSON.parse(data)

                readMessage(message)

            })

        content_message.val('');
        content_message.focus();

    });



</script>

</body>
</html>
