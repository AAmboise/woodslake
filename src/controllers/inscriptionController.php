<?php
require_once './src/models/models.php';
require_once './src/database/UserDataBase.php';
require_once './src/database/database.php';

$titre = "Connexion";
$css = '<link rel="stylesheet" href="./assets/css/style.css">';
$menu = true;
$header = true;
$script = '<script type="text/javascript" src="../assets/js/inscription.js"></script>';
$alerte = '';
require_once './views/pages/inscription.php';


if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['telephone']) && !empty($_POST['password']) && !empty($_POST['password2'])){
    if($_POST['password'] == $_POST['password2']){
        $user = new User(null, $_POST['nom'],$_POST['prenom'],$_POST['email'],$_POST['telephone'],$_POST['password'],0);
        UserDataBase::create($user);

    }
    else{
        $alerte = 'les mots de passe ne sont pas identique';
        echo 'les mots de passe ne sont pas identique';
    }
}
else {
    $alerte = 'tout les champs ne sont pas rempli';
    echo 'tout les champs ne sont pas rempli';
}










?>

