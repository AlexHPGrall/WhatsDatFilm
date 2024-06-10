$(document).ready(function () {

    var movies = [];
    var movieSimilarities = {'Actors': [], 'Production': [], 'Genre': [], 'Director': [], 'Release Date': null};
    var movieData = {'Actors': [], 'Production': [], 'Genre': [], 'Director': [], 'Release Date': null};
    let filmList = document.querySelector(".filmList");
    let similaritiesContainer = document.getElementById('similarities');
    let historyContainer = document.getElementById('history');
    let historyHtml = '';

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
                prepareAnswers(movieId, movieSimilarities);
            },
            error: function (response, erreur) {
                console.log(response);
                console.log(erreur);
            },
        });

    }

    function prepareAnswers(movieId, movieSimilarities)
    {
        $.ajax({
            url: '/api/api_search.php',
            type: 'GET',
            data: { functionname: 'getMovieData', movieId: movieId },
            success: function (response) {
                movieData = JSON.parse(response);
                displaySimilarities(movieData, movieSimilarities);
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

    function displaySimilarities(movieData, similarities) {

        displayAnswer(movieData);

        let html = '';

        if(similarities instanceof Array) {
            if (similarities.includes('Success')) {
                html += '<h4>Félicitations! Vous avez trouvé le film du jour!</h4>';
            }
        }
        else {

            html ='<div class="film-container">';
            html +='<div>';
            html +='         <div>';
            /*html +='  <h2>'
            html += 'Film du Jour';
            html +=' </h2>';*/
            html +=' </div>';
            html +='  <div>';
            similarities.Genre.forEach(genre => {
                html +=` <div class="genre-btn">${genre.genreName}</div>`;
            });
            html +='     </div>';
            html +='   <div>';
            html +='  <div class="detail-btn">';
            html += similarities.releaseDate;
            html += '</div>';
            html +=' </div>';
            html +='  <div class="displayAnswerContainer2">';
            similarities.Production.forEach(prod => {
                html +=` <div class="detail-btn"><div class="production-name"><p>${prod.productionCompanyName}</p></div></div>`;
            });
            html +='</div>';

            html +=' <h5>Acteurs :</h5>';
            html +=' <div class="displayAnswerContainer2">';
            
            html +='<div>';
            similarities.Actors.forEach(actor => {
                html +=` <div class="actor-btn"><img src="${actor.actorImageUrl}" alt="${actor.actorName}"><div class="actor-name"><p>${actor.actorName}</p></div></div>`;
            });
            html +=' </div>';
            html +='</div>';
            html +=' <h5>Réalisateurs :</h5>';
            html +='<div class="displayAnswerContainer2">';
            
            similarities.Director.forEach(director => {
                html +=` <div class="director-btn"><img src="${director.directorImageUrl}" alt="${director.directorName}"><div class="director-name"><p>${director.directorName}</p></div></div>`;
            });
            html +='</div>';
            html +=' </div>';
            html +=' </div>';
            
        }

        historyContainer.innerHTML = html + historyHtml;
    }

    function displayAnswer(movieData)
{
    let html ='<div class="film-container">';
    html +='<div class="film-box" style="background-image: url(\'';
    html += movieData.movieImageUrl;
    html+='\');">';
    html +='<div class="film-content">';
    html +='         <div class="film-header">';
    html +='  <h2>'
    html += movieData.movieTitle;
    html +=' </h2>';
    html +=' </div>';
    html +='  <div class="film-genres">';
    movieData.Genre.forEach(genre => {
        html +=` <button class="genre-btn">${genre.genreName}</button>`;
 });
    html +='     </div>';
    html +='   <div class="film-details">';
    html +='  <button class="detail-btn">';
    html += movieData.releaseDate;
    html += '</button>';
    html +=' </div>';
    html +=' <div class="film-cast">';
    html +=' <h5>Actors</h5>';
    html +='<div class="actors-list">';
    movieData.Actors.forEach(actor => {
       html +=` <button class="actor-btn"><img src="${actor.actorImageUrl}" alt="${actor.actorName}"><div class="actor-name"><p>${actor.actorName}</p></div></button>`;
});
    html +=' </div>';
    html +='</div>';
    html +='<div class="film-director">';
    html +=' <h5>Director</h5>';
    movieData.Director.forEach(director => {
        html +=` <button class="director-btn"><img src="${director.directorImageUrl}" alt="${director.directorName}"><div class="director-name"><p>${director.directorName}</p></div></button>`;
 });
    html +='</div>';
    html +=' </div>';
    html +=' </div>';
    html +='</div>';
    //html += similaritiesContainer.innerHTML
    historyHtml = html + historyHtml;
}

});

