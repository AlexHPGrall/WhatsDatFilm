$(document).ready(function() {

    var button = $("form :submit");

    button.on('click',function(event) {
        event.preventDefault();

        var form = $(this).closest('form');
        var post = form.attr('name');

        var confirmation = confirm("Êtes-vous sûr de vouloir continuer ?");
        if (confirmation) {
            form.submit();
        } 
    });
});