$(document).ready(function () {

    var movies = [];
    let filmList = document.querySelector(".filmList");

    $('#searchInput').on('input', function () {
        var query = $(this).val();
        
        if (query.length >= 2) {
            searchInput.parentElement.classList.add("active");
            filmList.style.display = "block";
            searchMovies(query); // Correction ici, passer 'query' directement
        } else {
            searchInput.parentElement.classList.remove("active");
            filmList.style.display = "none";
        }
    });
    
    function searchMovies(query) {
        $.ajax({
            url: '/api/api_search.php',
            type: 'GET',
            data: { query: query },
            success: function (data) {
                filmList.innerHTML = displayResults(data);
            },
            error: function () {
                console.log('Erreur lors de la requête AJAX.');
            }
        });
    }

    function displayResults(data) {
        var results = "";
        var tableHeader = '<table><thead></thead><tbody>';
        var tableFooter = '</tbody></table>';
        data = JSON.parse(data);
        if (data && data["results"] && data["results"].length > 0) {
            
            $.each(data.results, function (index, movie) {
                var imageUrl = movie.poster_path ? 'https://image.tmdb.org/t/p/w500' + movie.poster_path : 'no-image.jpg';
                var title = movie.title;
                var releaseYear = movie.release_date ? '(' + movie.release_date.substring(0, 4) + ')' : '(Date inconnue)';
                var table = '<tr>' + '<td><strong>' + title + '</strong></td>' + '<td>' + releaseYear + '</td>' +
                '<td><img src="' + imageUrl + '" alt="' + title + '" class="filmPoster"></td>' + '<td>' + movie.overview + '</td>' +
                '<td><button class="add-btn" data-id="' + movie.id + '">Add to database</button></td>' + '</tr>';
                results += table;
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
            return tableHeader + results + tableFooter;
        } else {
            return '<p>No result found.</p>';
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
