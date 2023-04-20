<?php require('./actions/users/signupAction.php');?>
<!DOCTYPE html>
<html lang="en">
<?php include "./includes/head.php";?>
<body>
  <br><br>
    <form class="container" method="POST">
      <?php if(isset($errorMsg)){echo'<p>'.$errorMsg.'</p>';}?>
      
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Nom</label>
          <input type="text" class="form-control" name="nom">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Prénom</label>
          <input type="text" class="form-control" name="prenom">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Pseudo</label>
          <input type="text" class="form-control" name="pseudo">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
          <input type="password" class="form-control" name="motdepasse">
        </div>
        <button type="submit" class="btn btn-primary" name="validate">S'inscrire</button>
        <br><br>
        <a href="login.php"><p>J'ai déja un compte, je me connecte</p></a>
    </form>
</body>
</html>