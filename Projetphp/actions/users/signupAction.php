<?php
session_start();
require ("./database.php");

//Validation du formulaire
if(isset($_POST["validate"])) {
    //Vérifier si l'user a bien completer tous les champs
    if(!empty($_POST["nom"]) AND !empty($_POST["prenom"]) AND !empty($_POST["pseudo"]) AND !empty($_POST["motdepasse"])) {
        //Les données de l'user
        $user_nom = htmlspecialchars($_POST["nom"]);
        $user_prenom = htmlspecialchars($_POST["prenom"]);
        $user_pseudo = htmlspecialchars($_POST["pseudo"]);
        $user_mdp = password_hash($_POST["motdepasse"], PASSWORD_DEFAULT);
        
        // Vérifier si l'utilisatur existe déja 
        $checkIfUserAlreadyExists = $bdd->prepare("SELECT pseudo FROM users WHERE pseudo = ?");
        $checkIfUserAlreadyExists-> execute(array($user_pseudo));

        if($checkIfUserAlreadyExists->rowCount()==0){
            //Inserée l'utilisateur dans la bdd
            $insertUsersOnWebSite = $bdd->prepare("INSERT INTO users(nom,prenom,pseudo,mdp)VALUE(?,?,?,?)");
            $insertUsersOnWebSite->execute(array($user_nom,$user_prenom,$user_pseudo,$user_mdp));

            //Récupérer les informations de l'utilisateur
            $getInfosOfThisUserReq = $bdd->prepare("SELECT id,nom,prenom,pseudo FROM users WHERE nom = ? AND prenom = ? AND pseudo = ?");
            $getInfosOfThisUserReq->execute(array($user_nom,$user_prenom,$user_pseudo));

            $userInfos = $getInfosOfThisUserReq->fetch();

            //Authentifier l'utilisateur et récupérer ses informations dans des variables globales Sessions
            $_SESSION["auth"]= true;
            $_SESSION["id"]= $userInfos["id"];
            $_SESSION["nom"]= $userInfos["nom"];
            $_SESSION["prenom"] =$userInfos["prenom"];
            $_SESSION["pseudo"] = $userInfos["pseudo"];

            //Rediriger l'utilisateur vers la page d'acceuil
            header("Location: index.php");
        }
        else{
            $errorMsg = "L'utilisateur existe déja sur le site";
        }
    }
    else{
        $errorMsg = "Veuillez completer tous les champs...";
    }
}