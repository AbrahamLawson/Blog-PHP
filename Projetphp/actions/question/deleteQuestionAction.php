<?php
session_start();
if(!isset($_SESSION["auth"])){
    header("Location: login.php");
}

require("../../database.php");

if(isset($_GET["id"]) AND !empty($_GET["id"])){
    $idOfTheQuestion = $_GET["id"];

    $checkIfQuestionExist = $bdd->prepare("SELECT id_authors FROM questions WHERE id = ?");
    $checkIfQuestionExist->execute(array($idOfTheQuestion));

    if($checkIfQuestionExist->rowCount() > 0){
        $questionInfos = $checkIfQuestionExist->fetch();
        if($questionInfos["id_authors"] == $_SESSION["id"]){
            $deleteThisQuestion = $bdd->prepare("DELETE FROM questions WHERE id = ?");
            $deleteThisQuestion->execute(array($idOfTheQuestion));

            header("Location: ../../my-questions.php");
        }
        else{
            echo "Vous n'avez pas le droit de supprimer une questions qui ne vous appartient pas !";
        }
    }
    else{
        echo "Aucune question n'a été trouver...";
    }
}
else{
    echo "Aucune question n'a été trouver...";
}