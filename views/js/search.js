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
        data = JSON.parse(data);
        if (data && data["results"] && data["results"].length > 0) {
            
            $.each(data.results, function (index, movie) {
                var imageUrl = 'https://image.tmdb.org/t/p/w500' + movie.poster_path;
                var title = movie.title;
                var releaseYear = movie.release_date ? movie.release_date.substring(0, 4) : 'Date inconnue';
                var listItem = '<li><img src="' + imageUrl + '" alt="' + title + '"><p><strong>' + title + '</strong> (' + releaseYear + ')</p></li>';
                resultsContainer.append(listItem);
                });
        } else {
            resultsContainer.append('<li>Aucun résultat trouvé.</li>');
        }
    } 
});
