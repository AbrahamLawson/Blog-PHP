<?php require("./database.php");

$getAllMyQuestions = $bdd->prepare("SELECT id,objet,description,pseudo_authors FROM questions WHERE id_authors = ? ORDER BY id DESC ");
$getAllMyQuestions->execute(array($_SESSION["id"]));