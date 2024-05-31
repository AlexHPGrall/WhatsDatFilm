<!DOCTYPE html>
<html lang="fr">

<!-- Header général de l'application -->

<header>
    <div class="headerLeft">
        <?php require $headerView ?> 
    </div>
    <div class="headerCenter">
        <img src="/views/Whats Dat Film.png" alt="Whats Dat Film" class="whatsDatImg">
    </div>
    <div class="headerRight">
        <form action="/loginController/logout" method="post">
            <button type="submit" class="logBtn"><img src="/views/style/logout.png" alt="déconnexion" class="logBtnContent"></button>
        </form>
    </div>
</header>