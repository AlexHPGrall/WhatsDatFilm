$(document).ready(function() {

    //Selectionne les élément HTML string (élément à rechercher) et search (bouton pour lancer la fonction)
    var stringToSearch = $('#string'); 
    var search = $('#search');
    var reset = $('#reset');
    
    function searchFunction() {
        // Réinitialise le style CSS de toutes les cellules du tableau
        $("td").css("background", "transparent");
        $("tr").show();

        var searchString = stringToSearch.val();
        var searchStringLower = stringToSearch.val().trim().toLowerCase(); //Convertie la chaine en minuscule
        
        if (searchString.trim() !== '') { // Si la chaine de caractère n'est pas vide
            // Parcourt toutes les lignes du tableau
            $("tr").each(function() {
                var rowContainsSearchString = false;

                // Parcourt toutes les cellules de la ligne, marque les cases et les lignes où la chaine de caractères est présente
                $(this).find("td").each(function() {
                    if ($(this).text().trim().toLowerCase().includes('supprimer') || 
                    $(this).text().trim().toLowerCase().includes('delete'|| 
                    $(this).text().trim().toLowerCase().includes('edit')) || 
                    $(this).text().trim().toLowerCase().includes('modifier')) {
                        return false;
                    } else if ($(this).text().trim().toLowerCase().includes(searchStringLower)) { 
                        $(this).css("background", "orange");
                        rowContainsSearchString = true;
                        return false;
                    }
                });
                $(this).find("th").each(function() { // Marque les th pour continuer de les afficher quoi qu'il arrive
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

    // Fonction pour reset la recherche
    function resetFunction() {
        $("td").css("background", "transparent");
        $("tr").show();
        stringToSearch.val('');
    }

    search.on('click', searchFunction);
    stringToSearch.on('keypress', function(e) {
        if (e.which === 13) {
            searchFunction();
        }
    });
    reset.on('click',resetFunction);
           
});