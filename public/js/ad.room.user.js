function ad_roomUser(room) {

    let url = location.href;

    if (!(url.includes(`&key_room=${room}`))) {
        location += `&key_room=${room}`;
    }
    event.preventDefault();

}


