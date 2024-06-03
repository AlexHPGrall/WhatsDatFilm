$(document).ready(function () {

    var movies = [];
    var movieSimilarities = {'Actors': [], 'Production': [], 'Genre': [], 'Director': [], 'Release Date': null};
    let filmList = document.querySelector(".filmList");
    let similaritiesContainer = document.getElementById('similarities');

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
                movieSimilarities = JSON.parse(mergeArray(movieSimilarities, JSON.parse(response)));
                displaySimilarities(movieSimilarities);
            },
            error: function (response, erreur) {
                console.log(response);
                console.log(erreur);
            },
        });
    }

    function mergeArray(list1, list2) {
        if (!list1) {
            list1 = {'Actors': [], 'Production': [], 'Genre': [], 'Director': [], 'Release Date': null};
        }  
        if (!list2) {
            list2 = {'Actors': [], 'Production': [], 'Genre': [], 'Director': [], 'Release Date': null};
        } 
        
        if(list2 instanceof Array) {
            if(list2.includes('Success')) {
                return JSON.stringify(list2, null, 4);
            }
        }

        const mergeCategories = (category, idKey) => {
            const items = {};
            if (list1[category]) {
                list1[category].forEach(item => {
                    items[item[idKey]] = item;
                });
            }

            if (list2[category]) {
                list2[category].forEach(item => {
                    items[item[idKey]] = item;
                });
            }

            return Object.values(items);
        };

        const mergedActors = mergeCategories('Actors', 'actorId');
        const mergedProduction = mergeCategories('Production', 'productionCompanyId');
        const mergedGenres = mergeCategories('Genre', 'genreId');
        const mergedDirectors = mergeCategories('Director', 'directorId');

        const mergedList = {
            Actors: mergedActors,
            Production: mergedProduction,
            Genre: mergedGenres,
            Director: mergedDirectors,
            'Release Date': list2['Release Date'] || list1['Release Date']
        };

        return JSON.stringify(mergedList, null, 4);
    }

    function displaySimilarities(similarities) {
        let html = '';

        if(similarities instanceof Array) {
            if (similarities.includes('Success')) {
                html += '<h4>Félicitations! Vous avez trouvé le film du jour!</h4>';
            }
        }
        else {
            if (similarities.Actors.length > 0) {
                html += '<div class="similarity-item"><h4>Acteurs en commun :</h4><ul>';
                similarities.Actors.forEach(actor => {
                    html += `<li>${actor.actorName}</li>`;
                });
                html += '</ul></div>';
            }

            if (similarities.Production.length > 0) {
                html += '<div class="similarity-item"><h4>Studios en commun :</h4><ul>';
                similarities.Production.forEach(studio => {
                    html += `<li>${studio.productionCompanyName}</li>`;
                });
                html += '</ul></div>';
            }

            if (similarities.Genre.length > 0) {
                html += '<div class="similarity-item"><h4>Genres en commun :</h4><ul>';
                similarities.Genre.forEach(genre => {
                    html += `<li>${genre.genreName}</li>`;
                });
                html += '</ul></div>';
            }

            if (similarities.Director.length > 0) {
                html += '<div class="similarity-item"><h4>Réalisateurs en commun :</h4><ul>';
                similarities.Director.forEach(director => {
                    html += `<li>${director.directorName}</li>`;
                });
                html += '</ul></div>';
            }
        }

        similaritiesContainer.innerHTML = html;
    }
});
