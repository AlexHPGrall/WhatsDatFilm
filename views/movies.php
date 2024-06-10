<!DOCTYPE html>
<html lang="fr">

<!-- Vue intégrée à la page admin, c'est le tableau des films enregistrés dans notre base de donnée -->

<div class="tableSearch">
    <input id="string" type="text" placeholder="bar de recherche" class="tableSearchElmt">
    <button class="btn tableSearchElmt" type="button" id="search">Rechercher</button>
    <button class="btn tableSearchElmt" type="button" id="reset">Réinitialiser</button>
</div>

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

                        <input type="hidden" name="movieId" value="<?= $movieData["movieId"] ?>"/>
                        <button type="submit">Supprimer</button>

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