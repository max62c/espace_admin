<?php
session_start();
//include 'database.php';
if(!$_SESSION['mdp']){
    header('Location: connexion.php');
}
$bdd = new PDO('mysql:host=localhost;dbname=espace_admin;', 'root', 'maxime');
$allusers = $bdd->query('SELECT * FROM membres ORDER BY id DESC');
if(isset($_GET['s']) AND !empty($_GET['s'])){
    $recherche = htmlspecialchars($_GET['s']);
    $allusers = $bdd->query('SELECT pseudo FROM membres WHERE pseudo LIKE "%'.$recherche.'%" ORDER BY id DESC');
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afficher les membres</title>
</head>
<body>
        <?php include_once('template.php'); ?>
        <section class="afficher_utilisateur">

            <?php
                $recupUsers = $bdd->query('SELECT * FROM membres');
                while($user = $recupUsers->fetch()){
                    ?>
            <div class="container">
                <div class="row p-3 bg-info bg-opacity-10 border border-info border-start-0 rounded-end">
                    <div class="col-md-4">
                        <p> <?= $user['pseudo']; ?> </p>
                    </div>
                    <div class="col-md-4">
                        <p> <?= $user['mail']; ?> </p>
                    </div>
                    <div class="col-md-4">
                    <a href="bannir.php?id=<?= $user['id']; ?>">
                    <button type="button" class="bi bi-trash3 btn btn-danger">  Supprimer</button>
                    </a>
                </div>
            </div>
        </div>
                    
                    <?php
                }
            ?>
</body>
</html>