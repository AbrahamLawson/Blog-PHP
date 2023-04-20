<?php
require("./database.php");

//Récupérer les questions par defauts sans la recherche
$getAllQuestion = $bdd->query("SELECT id, id_authors,objet,description,pseudo_authors,date_publication FROM questions ORDER BY id DESC LIMIT 0,5");

//Vérifier si une recherhce a ete rentrer par l'utilisateur 
if(isset($_GET["search"]) AND !empty($_GET["search"])){

    //La rehcerche
    $userSearch = $_GET["search"];

    //Récupérer toute les questions qui correspondent a la recherche (en fonction du titre)
    $getAllQuestion = $bdd->query('SELECT id, id_authors,objet,description,pseudo_authors,date_publication FROM questions WHERE objet LIKE"%'.$userSearch.'%" ORDER BY id DESC');
}