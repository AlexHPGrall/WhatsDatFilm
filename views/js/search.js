$(document).ready(function () {
    var movies = [];
    let list_group = document.querySelector(".list-group");

    $('#searchInput').on('input', function () {
        var query = $(this).val();
        
        if (query.length >= 2) {
            searchInput.parentElement.classList.add("active");
            list_group.style.display = "block";
            searchMovies(query); // Correction ici, passer 'query' directement
        } else {
            searchInput.parentElement.classList.remove("active");
            list_group.style.display = "none";
        }
    });
    
    function searchMovies(query) {
        $.ajax({
            url: '/api/api_search.php',
            type: 'GET',
            data: { query: query },
            success: function (data) {
                list_group.innerHTML = displayResults(data);
            },
            error: function () {
                console.log('Erreur lors de la requête AJAX.');
            }
        });
    }

    function displayResults(data) {
        var results = "";
        data = JSON.parse(data);
        if (data && data["results"] && data["results"].length > 0) {
            
            $.each(data.results, function (index, movie) {
                var imageUrl = movie.poster_path ? 'https://image.tmdb.org/t/p/w500' + movie.poster_path : 'no-image.jpg';
                var title = movie.title;
                var releaseYear = movie.release_date ? '(' + movie.release_date.substring(0, 4) + ')' : '(Date inconnue)';
                var listItem = '<li><p><strong>' + title + '</strong> ' + releaseYear + '</p><img src="' + imageUrl + '" alt="' + title + '"><div>' + movie.overview + '</div><button class="add-btn" data-id="' + movie.id + '">Ajouter à la base de données</button></li>';
                results += listItem;
                var movieData = {
                    id: movie.id,
                    title: movie.title,
                    frenchTitle: null,
                    runtime: null,
                    releaseDate: movie.release_date,
                    movieImageUrl: imageUrl,
                    movieRating: movie.vote_average,
                };
                movies[movie.id] = movieData;
            });
            return results;
        } else {
            return '<li>Aucun résultat trouvé.</li>';
        }
    }

    $(document).on('click', '.add-btn', function () {
        console.log("BOUTON CLIQUÉ");
        var movieId = $(this).data('id');
        var movieData = movies[movieId];
        addToDatabase(movieData);
    });

    function addToDatabase(movieData) {
        console.log(movieData);
        $.ajax({
            url: '/api/tmdb.php',
            type: 'POST',
            data: { functionname: 'add', arguments: [movieData] },
            success: function () {
                alert('Film ajouté à la base de données avec succès !');
            },
            error: function () {
                console.log('Erreur lors de la requête AJAX.');
            }
        });
    }
});
