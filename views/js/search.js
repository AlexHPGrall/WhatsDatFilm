

$(document).ready(function () {
    var movies = [];
    $('#inputTxt').on('input', function () {
        ListItemGenerator();
    });
    
    let list_group = document.querySelector(".list-group");
    function ListItemGenerator() {
    if (!inputTxt.value || inputTxt.value.length <= 3) {
      inputTxt.parentElement.classList.remove("active");
      list_group.style.display = "none";
    } else {
      inputTxt.parentElement.classList.add("active");
      list_group.style.display = "block";
      let SearchResults = searchMovies(inputTxt.value);
      
      //CreatingList(SearchResults);
  
      function CreatingList(MovieResults) {
        let createdList = MovieResults;
        let CustomListItem;
        if (!CreatingList.length) {
            createdList = "<li>" + inputTxt.value + "</li>";
        } 
        
        list_group.innerHTML = createdList;
        //CompleteText();
      }
    }
  
    function CompleteText() {
      all_list_items = list_group.querySelectorAll("li");
      all_list_items.forEach(function (list) {
        list.addEventListener("click", function (e) {
          inputTxt.value = e.target.textContent;
          list_group.style.display = "none";
        });
      });
    }

    function searchMovies(query) {
        $.ajax({
            url: '/api/api_search.php',
            type: 'GET',
            data: { query: query },
            success: function (data) {
                results =displayResults(data);
                list_group.innerHTML = results;
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
            inputTxt.parentElement.classList.add("active");
            $.each(data.results, function (index, movie) {
                var imageUrl = 'https://image.tmdb.org/t/p/w500' + movie.poster_path;
                var title = movie.title;
                var releaseYear = movie.release_date ? movie.release_date.substring(0, 4) : 'Date inconnue';
                var listItem = '<li><div class="poster"><img src="' + imageUrl + '" alt="' + title + '"><p><strong>' + title + '</strong> (' + releaseYear + ')</p></div><div>' + movie.overview + '</div><button class="add-btn" data-id="' + movie.id + '">Ajouter à la base de données</button></li>';
                results+=listItem;
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
                
            return results;
        } else {
            return '<li>Aucun résultat trouvé.</li>';
        }
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
   
  

  