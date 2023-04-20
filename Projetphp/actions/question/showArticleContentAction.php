<?php 
require("./database.php");

//Vérifier si l'id de la question est rentrer dans l'URL et Vérifier si la variable $_GET["id"] n'est pas vide
if(isset($_GET["id"]) AND !empty($_GET["id"])){
    
    //Récupére l'id de la questions
    $IdOfTheQuestion = $_GET["id"];

    //Vérifier si la question existe
    $checkIfQuestionExist = $bdd->prepare("SELECT * FROM questions WHERE id = ?");
    $checkIfQuestionExist->execute(array($IdOfTheQuestion));

    if($checkIfQuestionExist->rowCount() > 0){

        //Récupérer toutes les data de la question avec la méthode fetch()
        $questionInfos = $checkIfQuestionExist->fetch();

        //Stocker les datas de la question dans des variables
        $question_objet = $questionInfos["objet"];
        $question_description = $questionInfos["description"];
        $question_content = $questionInfos["content"];
        $question_id_Authors = $questionInfos["id_authors"];
        $question_pseudo_authors = $questionInfos["pseudo_authors"];
        $question_date_publication = $questionInfos["date_publication"];
    }
    else{
        $errorMsg = "Aucun n'articles na été trouver";
    }
}
else{
    $errorMsg = "Aucun n'articles na été trouver";
}