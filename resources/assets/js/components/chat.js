module.exports = {

    ready: function() {
        alert('que merda é essa');
        Echo.channel(`room.1`)
            .listen('SendMessage', (e) => {
                console.log(e);
            });
    },
};
