<?php
require("./database.php");

//Récupérer l'identifiant de l'utilisateur
if(isset($_GET["id"]) AND !empty($_GET["id"])){

    //L'id de l'utilisateur
    $idOfUsers = $_GET["id"];

    //Vérifier si l'utilisateur existe 
    $checkIfUsersExist = $bdd->prepare("SELECT pseudo,nom,prenom FROM users WHERE id = ?");
    $checkIfUsersExist->execute(array($idOfUsers));


    if($checkIfUsersExist->rowCount() > 0){

        //Récupérer toutes les données de l'utilisateur
        $usersInfos = $checkIfUsersExist->fetch();

        //Stocker les data de l'utilisateur
        $users_pseudo = $usersInfos["pseudo"];
        $users_nom = $usersInfos["nom"];
        $users_prenom = $usersInfos["prenom"];

        //Récupérer toutes les questions publiers par l'utilisateur
        $getThisQuestion = $bdd->prepare("SELECT * FROM questions WHERE id_authors = ? ORDER BY id DESC" );
        $getThisQuestion->execute(array($idOfUsers));
    }
    else{
        $errorMsg= "Aucun n'utilisateur trouver...";
    }
}
else{
    $errorMsg= "Aucun n'utilisateur trouver...";
}