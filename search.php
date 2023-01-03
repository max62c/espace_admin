<?php
$bdd = new PDO('mysql:host=localhost;dbname=espace_admin;', 'root', 'maxime');
$allusers = $bdd->query('SELECT * FROM membres ORDER BY id DESC');
if(isset($_GET['s']) AND !empty($_GET['s'])){
    $recherche = htmlspecialchars($_GET['s']);
    $allusers = $bdd->query('SELECT pseudo FROM membres WHERE pseudo LIKE "%'.$recherche. '%" ORDER BY id DESC');
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rechercher des utilisateurs</title>
</head>
<body>
    <?php include_once('template.php'); ?>
    <form method="GET">
        <input type="search" name="s" placeholder="Rechercher un utilisateur" autocomplete="off">
        <input type="submit" name="envoyer">
    </form>

    <section class="afficher_utilisateur">

        <?php
            if($allusers->rowCount() > 0){
                while($user = $allusers->fetch()){
                    ?>
                    <p><?= $user['pseudo']; ?></p>
                    <?php
                }

            }else{
                ?>
                <p>Aucun utilisateur trouvé</p>
                <?php
            }
        ?>
    </section>
</body>
</html>