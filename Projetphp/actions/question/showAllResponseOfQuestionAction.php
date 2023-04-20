<?php
require("./database.php");

$getAllAnswersThisQuestion = $bdd->prepare("SELECT id_authors,pseudo_authors,id_question,content FROM response WHERE id_question = ? ORDER BY id DESC");
$getAllAnswersThisQuestion->execute(array($_GET["id"]));