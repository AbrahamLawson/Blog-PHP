<?php
require("actions/users/securityAction.php");
require("actions/question/getInfosOfEditedQuestionAction.php");
require("actions/question/editQuestionAction.php");

?>
<!DOCTYPE html>
<html lang="en">
<?php include "includes/head.php";?>
<?php include "includes/navBar.php";?>

<body>
    <br><br>

    <div class="container">
        <?php 
           if(isset($errorMsg)){
            echo'<p>'.$errorMsg.'</p>';
            }
        ?>
        <?php
            if(isset($question_content)){
                ?>
                <form method="POST">
                    
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Objet de la question</label>
                        <input type="text" class="form-control" name="objet" value="<?=$question_objet?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Description de la question</label>
                        <textarea class="form-control" name="description" ><?=$question_description?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Contenu de la question</label>
                        <textarea class="form-control" name="content" rows="5"><?=$question_content?></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary" name="validate" value="">Modifier la question</button>
 
                </form>
                <?php
            }
        ?>
            
        
    </div>
</body>
</html>