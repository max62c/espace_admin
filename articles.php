<?php
session_start();
include 'database.php';
if(!$_SESSION['mdp']){
    header('Location: connexion.php');
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afficher tous les articles</title>
</head>
<body>
    <?php include_once('template.php'); ?>
    <?php 
    $recupArticle = $bdd->query('SELECT * FROM articles');
    while($article = $recupArticle->fetch()){
        ?>
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <h2> <?= $article['titre']; ?> </h2>
                </div>
                <div class="col-sm-4">
                    <p> <?= $article['description']; ?> </p>
                </div>
                <div class="col-sm-2">
                    <p> <?= $article['date']; ?> </p>
                </div>
                <div class="col-sm-2">
                    <a href="modifier-article.php?id=<?= $article['id']; ?>">
                    <button type="button" class="btn btn-secondary">Modifier cet article</button>
                    </a>
                </div>
                <div class="col-sm-2">
                    <a href="supprimer-article.php?id=<?= $article['id']; ?>">
                    <button type="button" class="btn btn-danger">Supprimer cet article</button>
                    </a>
                </div>
            </div>
        </div>
        <?php
    }
    
    ?>
</body>
</html>
<footer>
    <?php include_once('footer.php'); ?>
</footer>