<?php
try {
    $bdd = new PDO("mysql:host=localhost;dbname=forum;charset=utf8;","root","");
}
 catch (Exeption $e) {
    die("une ereur a ete trouver:". $e->getMessage());
    
}
