$(document).ready(function () {
    $('#searchInput').on('input', function () {
        var query = $(this).val();

        if (query.length >= 2) {
            searchMovies(query);
        } else {
            $('#results').empty();
        }
    });

    function searchMovies(query) {
        $.ajax({
            url: '/api/api_search.php',
            type: 'GET',
            data: { query: query },
            success: function (data) {
                displayResults(data);
            },
            error: function () {
                console.log('Erreur lors de la requête AJAX.');
            }
        });
    }

    function displayResults(data) {
        var resultsContainer = $('#results');
        resultsContainer.empty();
        console.log(data);
        if (data && data.results && data.results.length > 0) {
            
            $.each(data.results, function (index, movie) {
                resultsContainer.append('<li><p><strong>' + movie.title + '</strong> (' + (movie.release_date ? movie.release_date.substring(0, 4) : 'Date inconnue') + ')</p></li>');
            });
        } else {
            resultsContainer.append('<li>Aucun résultat trouvé.</li>');
        }
    } 
});
