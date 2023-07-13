<!DOCTYPE html >
<html>
<head>
  <title>Admin</title>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/images/assets/images/bootstrap-icons-1.10.5/font/bootstrap-icons.css">
        <link rel="stylesheet" href="./assets/css/style.css"></link>
  </head>
</head>
<body >
    
<?php
    session_start();
    include "./adminHeader.php";
    include "./sidebar.php";
    include "../connexiondb.php";
    $mat=$_SESSION['matricule'];

    // la filiere de l'etudiant
    
    
    $resq1 = "SELECT * FROM cours INNER JOIN suivre ON cours.Code_cours=suivre.Code_cours WHERE Matricule = '$mat'";
    $resultat2 = $idcnx->query($resq1);
    echo '<div id="main-content" class="container allContent-section py-4">'.
    '<div class="row">';
    while ($ligne2 = $resultat2->fetch (PDO::FETCH_ASSOC)){
      $intitule = $ligne2['Intitule'];
        ?> 
  <div class="col-sm-4">
                  <div class="card">
                          <i class="fa fa-book  mb-2" style="font-size: 70px; color:white"></i>
                          <h4 style="color:white;"><?php echo  $ligne2['Intitule']; ?> </h4>
                          <h5 style="color:white;">
                            <form action="" method="#">
                              <button name="#" class="nav-name">Voir</button>
                            </form>                         
                          </h5>
                        </div>
                    </div>.
                    
 
       
        
   <?php 
            }
            echo '</div>'.
        
            '</div>';
   ?>






  
<!--
    <div id="main-content" class="container allContent-section py-4">
        <div class="row">
        
                <h2>Choisissez une filière</h2>
                
                <div class="container">
                  <div class="row justify-content-center">
                    
                    
                  </div>
                  <div class="row justify-content-center">
                      <div class="col-sm-4">
                        <div class="card">
                          <i class="fa fa-book  mb-2" style="font-size: 70px; color:white"></i>
                          <h4 style="color:white;">ELECTRONIQUE</h4>
                          <h5 style="color:white;">
                            <form action="posterCours.php" method="post">
                              <button name="Poster1" class="nav-name">Poster</button>
                            </form>                         
                          </h5>
                        </div>
                    </div>

                  </div>
                </div>


                </div>
         
         </div>
        
    </div>-->
       
            
       


    <script type="text/javascript" src="./assets/js/ajaxWork.js"></script>    
    <script type="text/javascript" src="./assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
 
</html>