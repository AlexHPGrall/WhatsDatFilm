<!DOCTYPE html>
<html lang="fr">

<div class="tableWrapper">
    <table>
        <thead>
            <tr>
                <th>Poster</th>
                <th>Titre</th>
                <th>Runtime</th>
                <th>Release date</th>
                <th>Movie rating</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach($table as $movieData)
                {
                    echo '<tr>',
                        '<td><img src="'.$movieData['movieImageUrl'].'" class="filmPoster" /></td>',
                        '<td>'.$movieData['movieTitle'].'</td>',
                        '<td>'.$movieData['runtime'].'</td>',
                        '<td>'.$movieData['releaseDate'].'</td>',
                        '<td>'.$movieData['movieRating'].'</td>',
                        '<td>',
                        '<form action="/Admin/Movie/Delete" method="post">
                            <button type="submit" name="movieId" value="'.$movieData["movieId"].'">Supprimer</button> 
                        </form>',
                        '</td>',
                    '</tr>';      
                }
            ?>
        <tbody>
    </table>

</div>

<form action="/admin/api" method="post">
    <button type="submit">Ajout film</button>
</form>