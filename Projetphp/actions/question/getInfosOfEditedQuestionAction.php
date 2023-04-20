<?php
require "./database.php";

if(isset($_GET["id"]) AND !empty($_GET["id"])){
    $idOfQuestion = $_GET["id"];
    $checkIfQuestionExist = $bdd->prepare("SELECT * FROM questions WHERE id = ?");
    $checkIfQuestionExist->execute(array($idOfQuestion));
    
    if($checkIfQuestionExist->rowCount() > 0){

        $questionInfos = $checkIfQuestionExist->fetch();
        if($questionInfos["id_authors"] == $_SESSION["id"]){
            $question_objet = $questionInfos["objet"];
            $question_description = $questionInfos["description"];
            $question_content = $questionInfos["content"];

        }
        else{
            $errorMsg = "Vous n'etes pas l'auteur de l'article";
        }
    }
    else{
        $errorMsg = "Aucun n'article na été trouver";
    }

}
else{
    $errorMsg = "Aucun n'article na été trouver";
}