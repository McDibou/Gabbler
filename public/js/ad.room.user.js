let interval = setInterval(dynamicTchat, 500)

let div = $('#tchat');
let content_message = $('#content_message');


$.post('./ajax.room.controller.php', {task: 'show'})

    .done(function (data) {

        let message = JSON.parse(data)

        readMessage(message)

        content_message.focus()

    })



function dynamicTchat() {

    $.post('./ajax.room.controller.php', {task: 'lastId'})

        .done(function (data) {

            let idShow = $('#tchat #id_message').last().val();

            if (idShow !== data) {

                $.post('./ajax.room.controller.php', {task: 'show', getId: idShow})

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

    $.post('./ajax.room.controller.php', {
        task: 'insert',
        content_message: content_message.val()
    })

        .done(function (data) {

            let message = JSON.parse(data)

            readMessage(message)

        })

    content_message.val('');
    content_message.focus();

})

