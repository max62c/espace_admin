<?php
session_start();
include 'database.php';
if(!$_SESSION['mdp']){
    header('Location: connexion.php');
}

if(isset($_POST['envoi'])){
    if(!empty($_POST['titre']) AND !empty($_POST['description']));
        $titre = htmlspecialchars($_POST['titre']);
        $description = nl2br(htmlspecialchars($_POST['description']));

        $insererArticle = $bdd->prepare('INSERT INTO articles (titre, description)VALUES(?, ?)');
        $insererArticle->execute(array($titre, $description));

        echo "L'article a bien été envoyé";
}else{
    echo "Veuillez compléter tous les champs...";
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publier un article</title>
</head>
<body>
    <?php include_once('template.php'); ?>
    <section class="publi-section">
        <div class="container">
            <div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Publier un article</h2>
				</div>
			</div>
            <form method="POST" action="">
                <div class="form-outline mb-6 p-2">
                    <input type="text" name="titre" class="form-control" placeholder="Titre de l'article" />
                </div>
                <div class="form-outline mb-6 p-2">
                    <textarea class="form-control" name="description" id="" rows="10" placeholder="Description de l'article"></textarea>
                </div>
                <div class="col-md-12 col-md-offset-4 text-center">
                <button type="submit" name="envoi" class="btn btn-primary btn-lg mb-2">Envoyer</button>
                <div>
            </form>
        </div>
    </section>
</body>
</html>
<footer>
    <?php include_once('footer.php'); ?>
</footer>