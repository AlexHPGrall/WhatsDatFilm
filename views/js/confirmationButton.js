$(document).ready(function() {

    var button = $("form :submit");

    button.on('click',function(event) {

        var form = $(this).closest('form');
        var post = form.attr('name');

        if (post === 'delete') {
            var confirmation = confirm("Êtes-vous sûr de vouloir supprimer cette ligne ?");
            if (confirmation) {
            } else {
                alert("Action annulée !");
                event.preventDefault();
            }

        } else if (post === 'add') {
            var confirmation = confirm("Êtes-vous sûr de vouloir ajouter des données ?");
            if (confirmation) {
            } else {
                alert("Action annulée !");
                event.preventDefault();
            }
        } 
    });
});