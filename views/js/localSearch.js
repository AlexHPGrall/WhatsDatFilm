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
            data: { functionname: 'searchLocal', query: query },
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
        console.log(data);
        if (data) {
            
            $.each(data, function (index, movie) {
                var imageUrl = movie.movieImageUrl ? movie.movieImageUrl : 'no-image.jpg';
                var title = movie.movieTitle;
                console.log(title);
                var releaseYear = movie.releaseDate ? '(' + movie.releaseDate.substring(0, 4) + ')' : '(Date inconnue)';
                var table = '<tr>' + '<td><strong>' + title + '</strong></td>' + '<td>' + releaseYear + '</td>' +
                '<td><img src="' + imageUrl + '" alt="' + title + '" class="filmPoster"></td>' +
                '<td><button class="add-btn" data-id="' + movie.movieId + '">select movie</button></td>' + '</tr>';
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
        var movieId = $(this).attr('data-id');
        confirmChoice(movieId);
    });

    function confirmChoice(movieId) {
        console.log(movieId);
        $.ajax({
            url: '/api/api_search.php',
            type: 'GET',
            data: { functionname: 'compareMovies', movieId: movieId },
            success: function (response) {
                console.log(response);
            },
            error: function (reponse, erreur) {
                console.log(reponse);
                console.log(erreur);
            },
        });
    }
});
