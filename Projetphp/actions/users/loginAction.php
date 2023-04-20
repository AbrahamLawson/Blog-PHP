<?php 
session_start();
require("./database.php");

if(isset($_POST["validate"])) {
    //Vérifier si l'user a bien completer tous les champs
    if(!empty($_POST["pseudo"]) AND !empty($_POST["motdepasse"])) {
        //Les données de l'user
        $user_pseudo = htmlspecialchars($_POST["pseudo"]);
        $user_mdp = htmlspecialchars($_POST["motdepasse"]);

        //On vérifie si le pseudo de l'utilisateur existe déja
        $checkIfUserExists = $bdd->prepare("SELECT * FROM users WHERE pseudo = ?");
        $checkIfUserExists->execute(array($user_pseudo));

        if($checkIfUserExists->rowCount() > 0){
            //Récupérer les données de l'utilisateur
            $userInfos = $checkIfUserExists->fetch();

            //On vérifie si c'est le bon mot de passe de l'utilisateur
            if(password_verify($user_mdp,$userInfos["mdp"])){

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
                $errorMsg = "Votre mot de passe est incorrect...";
            }
        }
        else{
            $errorMsg = "Votre pseudo est incorrect...";
        }
      
    }
    else{
        $errorMsg = "Veuillez completer tous les champs...";
    }
}