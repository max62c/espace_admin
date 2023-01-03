<?php
session_start();
include 'database.php';
if(isset($_GET['id']) AND !empty($_GET['id'])){
    $getid = $_GET['id'];
    $recupUser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
    $recupUser->execute(array($getid));
    if($recupUser->rowCount() > 0){

        $bannirUser = $bdd->prepare('DELETE FROM membres WHERE id = ?');
        $bannirUser->execute(array($getid));

        header('Location: membres.php');

    }else{
        echo "Aucun membre n'a été trouvé";
    }
}else{
    echo "L'identifiant n'a pas été récupéré";
}
if(!$_SESSION['mdp']){
    header('Location: connexion.php');
}
?>