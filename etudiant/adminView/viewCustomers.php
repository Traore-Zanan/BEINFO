<?php 
session_start();  
?>

<div >
  <h2>Profil</h2>
  <form action="" method="post">
  
    <div class="row">
        <div class="col-8" >
            <div class="top-margin">
              <label>Nom  </label>
              <input type="text" name="nom" value="<?php echo $_SESSION['nom'];    ?> " class="form-control" required>
            </div>
            <div class="top-margin">
              <label>Prénoms  </label>
              <input type="text"name="prenom" value="<?php echo $_SESSION['prenom']; ?> " class="form-control" required>
            </div>
            
            <div class="top-margin">
              <label>Matricule  </label>
              <input type="text" name="matricule "   value="<?php echo $_SESSION['matricule']; ?> "  class="form-control" required>
            </div>
            <div class="top-margin">
              <label>Email Address  </label>
              <input type="email" value="<?php echo $_SESSION['email']; ?> " name="email" class="form-control" required disabled>
            </div>

            <div class="row top-margin">
              <div class="col-sm-6">
                <label>Mot de pass  </label>
                <input type="password" name="pass" class="form-control" >
              </div>
              <div class="col-sm-6">
                <label>Confirmer mot de pass  </label>
                <input type="password" name="repass" class="form-control" >
              </div>
            </div>

            <hr>

            <div class="row">
              <div class="col-lg-8">
                                        
              </div>
              <div class="col-lg-4 text-right">
                <input type="submit"  class="btn btn-action" name="valider" value="Modifier" />
              </div>
            </div>
          
      </div>
      <div class="col-4 ">
        <img class="mx-3" src="./assets/images/logo.png" width="120" height="120" > 
        <input type="file" class="btn btn-action" name="photo" id="photo" accept="image/*" >

      </div>
    </div>
    </form>
    </div>
  