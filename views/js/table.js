$(document).ready(function() {

    //Selectionne les élément HTML string (élément à rechercher) et search (bouton pour lancer la fonction)
    var stringToSearch = $('#string'); 
    var search = $('#search');
    var reset = $('#reset');
    
    function searchFunction() {
        $("td").css("background", "transparent");
        $("tr").show();

        var searchString = stringToSearch.val();
        
        if (searchString.trim() !== '') {
            // Réinitialise le style CSS de toutes les cellules du tableau
            $("td").css("background", "transparent");

            // Cherche toutes les cellules qui contiennent la chaîne de caractères et les surligne en orange
            $("td:contains('" + searchString + "')").css("background", "orange");

            // Parcourt toutes les lignes du tableau
            $("tr").each(function() {
                var rowContainsSearchString = false;

                // Parcourt toutes les cellules de la ligne
                $(this).find("td").each(function() {
                    if ($(this).text().includes(searchString)) {
                        rowContainsSearchString = true;
                        return false;
                    }
                });
                $(this).find("th").each(function() {
                    rowContainsSearchString = true;
                });

                // Masque la ligne si elle ne contient pas la chaîne de caractères recherchée
                if (!rowContainsSearchString) {
                    $(this).hide();
                } else {
                    $(this).show(); // Affiche la ligne si elle contient la chaîne de caractères recherchée
                }
            });
        }
    }

    function resetFunction() {
        $("td").css("background", "transparent");
        $("tr").show();
        stringToSearch.val('');
    }

    search.on('click', searchFunction);
    reset.on('click',resetFunction);
           
});