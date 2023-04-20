<?php
session_start();
require("actions/question/showArticleContentAction.php"); 
require("actions/question/publishAnswerAction.php");
require("actions/question/showAllResponseOfQuestionAction.php"); 

?>
<!DOCTYPE html>
<html lang="en">
<?php include "includes/head.php" ?>;
<body>
    <?php include "includes/navBar.php" ?> ;
    <br><br>
     
    <div class="container">
        
        <?php

        //Vérifier si la variable $errorMsg est déclarer pour afficher le message d'erreur
        if(isset($errorMsg)){echo $errorMsg;}


        // Vérifier si la variable $question_date_publication existe, Si cette variable la existe on va pouvoir afficher toutes les donner de la question
            if(isset($question_date_publication)){
                ?>
                <section class="show-content">
                    <h3><?= $question_objet; ?></h3>
                    <hr /> <!--Balise qui inserre une ligne horizontale-->
                    <h4><?= $question_description; ?></h4>
                    <hr />
                    <p><?= $question_content; ?></p>
                    <hr />
                    <small><?= $question_pseudo_authors." ".$question_date_publication; ?></small>
                </section>
                <br>
                <section class="show-answers">
                    <form class="form-group" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Réponse :</label>
                            <textarea name="answer" class="form-control"></textarea>
                            <br>
                            <button class="btn btn-primary" type="submit" name="validate">Répondre</button>
                        </div>
                    </form>
                    <?php
                        while($answer = $getAllAnswersThisQuestion->fetch()){
                            ?>
                                <div class="card bg-success text-white">
                                    <div class="card-header">
                                        <?= $answer["pseudo_authors"];?>
                                    </div>
                                    <div class="card-body">
                                        <?= $answer["content"];?>
                                    </div>
                                </div>
                                <br>
                            <?php
                        }
                    ?>
                </section>

                <?php
            }
        ?>
    </div>
</body>
</html>