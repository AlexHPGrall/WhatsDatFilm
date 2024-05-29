<!DOCTYPE html>
<html lang="fr">

<div class="tableWrapper">
    <table>
        <thead>
            <tr>
                <th>Poster</th>
                <th>Titre</th>
                <th>Durée</th>
                <th>Date de sortie</th>
                <th>Note</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach($table as $movieData): ?>
                <tr>
                    <td><img src="<?= $movieData['movieImageUrl'] ?>" class="filmPoster" /></td>
                    <td><?= $movieData['movieTitle'] ?></td>
                    <td><?= $movieData['runtime'] ?></td>
                    <td><?= $movieData['releaseDate'] ?></td>
                    <td><?= $movieData['movieRating'] ?></td>
                    <td>
                        <form action="/admin/movie/delete" method="post">
                            <button class="btn" type="submit" name="movieId" value="'.$movieData["movieId"].'">Supprimer</button> 
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        <tbody>
    </table>

</div>

<form action="/admin/api" method="post">
    <button class="btn" type="submit">Ajouter un film</button>
</form>