<?php 
require("actions/users/securityAction.php");
require("actions/question/publishQuestionAction.php");
?>
<!DOCTYPE html>
<html lang="en">
<?php include "includes/head.php"; ?>
<body>
    <?php include "includes/navBar.php";?>
    <br><br>
    
    <form class="container" method="POST">
        <?php if(isset($errorMsg)){
            echo'<p>'.$errorMsg.'</p>';
            }
            elseif(isset($successMsg)){
                echo'<p style="color: rgb(0,255,0); font-size: 1.5em;">'.$successMsg.'</p>';
            }
            ?>
            

            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Objet de la question</label>
              <input type="text" class="form-control" name="objet">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Description de la question</label>
              <textarea class="form-control" name="description" ></textarea>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Contenu de la question</label>
              <textarea class="form-control" name="content" rows="5"></textarea>
            </div>

            <button type="submit" class="btn btn-primary" name="validate">Publier la question</button>
 
    </form>
</body>
</html>