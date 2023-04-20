<?php 
require("actions/users/securityAction.php");
require("actions/question/myQuestionAction.php");
?>
<!DOCTYPE html>
<html lang="en">
<?php include "includes/head.php";?>
<body>
    <?php include "includes/navBar.php";?>
    
    <br><br>
<div class="container">
    <?php
        while($question = $getAllMyQuestions->fetch()){
            ?>
            <div class="card">
                <h5 class="card-header">
                    <a href="./article.php?id=<?= $question["id"];?>">
                        <?= $question["objet"]; ?>
                    </a>
                </h5>
                <div class="card-body">
                    <p class="card-text">
                        <?php 
                        echo $question["description"];
                        ?>
                    </p>
                    <a href="./article.php?id=<?= $question["id"];?>" class="btn btn-primary">Accéder à l'article</a>
                    <a href="edit-question.php?id=<?= $question["id"]; ?>" class="btn btn-warning">Modifier l'article</a>
                    <a href="actions/question/deleteQuestionAction.php?id=<?= $question["id"]; ?>" class="btn btn-danger">Supprimer l'article</a>

                </div>
            </div>
            <br>
            <?php
         }
    
    ?>
</div>
</body>
</html>