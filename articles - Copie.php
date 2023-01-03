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
        <div class="article" style="border: 1px solid black;">
            <h1><?= $article['titre']; ?></h1>
            <p><?= $article['description']; ?></p>
            <a href="supprimer-article.php?id=<?= $article['id']; ?>">
            <button style="color:white; background-color: red; margin-bottom: 10px;">Supprimer cet article</button>
            </a>
            <a href="modifier-article.php?id=<?= $article['id']; ?>">
            <button style="color:black; background-color: yellow; margin-bottom: 10px;">Modifier cet article</button>
            </a>
        </div>
        <br>
        <?php
    }
    
    ?>
</body>
</html>
<footer>
    <?php include_once('footer.php'); ?>
</footer>