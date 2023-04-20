<?php 
session_start();
require("actions/users/showUsersProfileAction.php");
?>

<!DOCTYPE html>
<html lang="en">
<?php include "includes/head.php";?>
<body>
    <?php include "includes/navBar.php"; ?>
    <br><br>
    
    <div class="container">
        <?php 
            if(isset($errorMsg)){echo $errorMsg;}

            if(isset($getThisQuestion)){
                ?>
                <div class="card">
                    <div class="card-body">
                        <h4>@<?= $users_pseudo; ?></h4>
                        <hr />
                        <p><?= $users_nom ." ". $users_prenom; ?></p>
                    </div>
                </div>
                <br>
                <?php
                while($question = $getThisQuestion->fetch()){
                    ?>
                    <div class="card">
                        <div class="card-header">
                            <h5><?= $question["objet"]; ?></h5>
                        </div>
                        <div class="card-body">
                            <p><?= $question["description"]; ?></p>
                        </div>
                        <div class="card-footer">
                            <small><?= "Par"." ".$question["pseudo_authors"]. " "."le"." ".$question["date_publication"]; ?></small>
                        </div>
                    </div>
                    <br>
                    <?php
                }
            }
    
        ?>
    </div>
</body>
</html>