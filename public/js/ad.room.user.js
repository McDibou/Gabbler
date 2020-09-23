function ad_roomUser(room) {

    let url = location.href;

    if (!(url.includes(room))) {
        let room =
        location += '&key_room=' + (room) ? room : null ;
    }
    event.preventDefault();

}