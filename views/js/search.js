$(document).ready(function () {
    var movies = [];
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
                var imageUrl = movie.poster_path ? 'https://image.tmdb.org/t/p/w500' + movie.poster_path : 'no-image.jpg';
                var title = movie.title;
                var releaseYear = movie.release_date ? '(' + movie.release_date.substring(0, 4) + ')' : '(Date inconnue)';
                var listItem = '<li><p><strong>' + title + '</strong> ' + releaseYear + '</p><img src="' + imageUrl + '" alt="' + title + '"><button class="add-btn" data-id="' + movie.id + '">Ajouter à la base de données</button></li>';
                var movieData = {
                    id : movie.id,
                    title: movie.title,
                    frenchTitle: null,
                    runtime: null,
                    releaseDate: movie.release_date,
                    movieImageUrl: imageUrl,
                    movieRating: movie.vote_average,
                };
                movies[movie.id] = movieData;
                resultsContainer.append(listItem);
                $('.add-btn').off('click');
                $('.add-btn').on('click', function () {
                    var movieId = $(this).data('id');
                    var movieData = movies[movieId];
                    addToDatabase(movieData);
                    alert('Film ajouté à la base de données avec succès !');
                });
            });
        } else {
            resultsContainer.append('<li>Aucun résultat trouvé.</li>');
        }
    }

    function addToDatabase(movieData) {
        console.log(movieData);
        $.ajax({
            url: '/api/tmdb.php',
            type: 'POST',
            data: {functionname: 'add', arguments: [movieData]},
            success: function () {
                alert('Film ajouté à la base de données avec succès !');
            },
            error: function () {
                console.log('Erreur lors de la requête AJAX.');
            }
        });
    }
});
