<?php
require("./database.php");
//Vérification de la validation du formulaire
if(isset($_POST["validate"])){
    //Vérifier si les champs sont remplis 
    if(!empty($_POST["objet"]) AND !empty($_POST["description"]) AND !empty($_POST["content"])){
        //Les données a faire passer dans la requete
        $new_question_objet = htmlspecialchars($_POST["objet"]);
        $new_question_description = htmlspecialchars($_POST["description"]);
        $new_question_content = htmlspecialchars($_POST["content"]);
    
        //Modifier les informations de la question qui posssede l'id rentrer en parametre
        $editQuestionOnWebSite = $bdd->prepare("UPDATE questions SET objet = ?,description = ?,content = ? WHERE id=? ");
        $editQuestionOnWebSite->execute(array($new_question_objet,$new_question_description,$new_question_content,$_GET["id"]));

        //Rediriger l'utilisateur dans la page de ces questions
        header("Location: my-questions.php");

    }
    else{
        $errorMsg = "Veuillez completez tous les champs...";
    }
}