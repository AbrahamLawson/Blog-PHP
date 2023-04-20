<?php
require("./database.php");

if(isset($_POST["validate"])){
    if(!empty($_POST["answer"])AND !empty($_SESSION["id"]) AND !empty($_SESSION["pseudo"])){
        $user_answer = htmlspecialchars($_POST["answer"]);
        $insertAnswer = $bdd->prepare("INSERT INTO response(id_authors,pseudo_authors,id_question,content)VALUE(?,?,?,?)");
        $insertAnswer->execute(array($_SESSION["id"],$_SESSION["pseudo"],$_GET["id"],$user_answer));

    }
    else{
        $errorMsg = "Veillez vous connectez pour repondre à un message";
    }
}

