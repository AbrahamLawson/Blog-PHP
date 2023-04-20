<?php require("./database.php");

if(isset($_POST["validate"])){
    if(!empty($_POST["objet"]) AND !empty($_POST["description"]) AND !empty($_POST["content"])){
        $question_objet = htmlspecialchars($_POST["objet"]);
        $question_description = nl2br(htmlspecialchars($_POST["description"]));
        $question_content = nl2br(htmlspecialchars($_POST["content"]));
        $question_date = date("d/m/Y");
        $question_idAuthors = $_SESSION["id"];
        $question_pseudoAuthors = $_SESSION["pseudo"];

        $insertQuestionOnWebSite = $bdd->prepare("INSERT INTO questions(objet,description,content,id_authors,pseudo_authors,date_publication) VALUE(?,?,?,?,?,?)");
        $insertQuestionOnWebSite->execute(
            array(
                $question_objet,
                $question_description,
                $question_content,
                $question_idAuthors,
                $question_pseudoAuthors,
                $question_date
            )
        );
        $successMsg = "Votre article à bien été publier sur le site";

    }
    else{
        $errorMsg = "Veuillez completer tous les champs...";
    }
}