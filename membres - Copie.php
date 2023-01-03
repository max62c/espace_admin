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
                    <p><?= $user['pseudo']; ?><a href="bannir.php?id=<?= $user['id']; ?>" style="color:red; text-decoration: none;">  Supprimer le membre</a></p>
                    <?php
                }
            ?>
        </section>
</body>
</html>