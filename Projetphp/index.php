<?php 
session_start();
require("actions/question/showAllQuestionAction.php")
?>
<!DOCTYPE html>
<html lang="en">
<?php include "includes/head.php";?>
<body>
    <?php include "includes/navBar.php";?>
    <br><br>

    <div class="container">

        <form method="GET">
            <div class="form-group row">
                <div class="col-8">
                    <input type="search" name="search" class="form-control">
                </div>
                <div class="col-4">
                    <button class="btn btn-success" type="submit">Rechercher</button>
                </div>

            </div>
        </form>
        <br> 
        <?php
            while($question = $getAllQuestion->fetch()){
                ?>
                <div class="card bg-secondary text-white">
                    <div class="card-header">
                        <a href="./article.php?id=<?= $question["id"];?>">
                            <?= $question["objet"]; ?>
                        </a>
                    </div>
                    <div class="card-body">
                        <?= $question["description"]; ?>
                    </div>
                    <div class="card-footer">
                        Publier par <a href="profile.php?id=<?= $question["id_authors"]; ?>"><?= $question["pseudo_authors"]; ?></a> le <?= $question["date_publication"]; ?>
                    </div>
                </div>
                <br>
                <?php
            }
        ?>
    </div>
</body>
</html>