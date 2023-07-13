<?php
           //$texte = file_get_contents('compt.txt');
           // $texte+=1 ;
           // file_put_contents('compt.txt',$texte);
        ?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Simulateur bulletin </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<body>
<div class="container px-200" >
  <h4 style=" border-bottom: 1px solid;">Bulletin de note   <span  style="color:white;">-----------------------------------------------------------------------</span>       Ecole Pour Tous</h4>
  <div >
    <div class="col-md-9">
<!--************************************************ ****************************************************** **************
//formulaire d'envois de notes -->
<form action="#" method="POST">
  <table border="1">
  <thead>
    <tr>
    <th>Matière</th>
    <th>Coefficient</th>
    <th>Notes</th>
    <th>Note ponderés</th>
    </tr>
   </thead>
   <theed>
  <?php
    include "../connexiondb.php";
    session_start();
    $mat=$_SESSION['matricule'];
    
    echo '<div>'.
    '<div class="row">'.
    
        '<div class="col-sm-4">'.
        '<div class="car">'.
                'Nom: '.$_SESSION['nom'].
            '</div>'.
        '</div>'.
        '<div class="col-sm-6">'.
        '<div class="car">'.
            'Filière: '.$_SESSION['filiere'].
        '</div>'.
        '</div>'.
      '</div>'.
    
'</div>';
echo '<div>'.
'<div class="row">'.

    '<div class="col-sm-4">'.
    '<div class="car">'.
            'Prenom: '.$_SESSION['prenom'].
        '</div>'.
    '</div>'.
    '<div class="col-sm-6">'.
    '<div class="car">'.
            'Matricule: '.$_SESSION['matricule'].
        '</div>'.
    '</div>'.
  '</div>'.

'</div>';


// boucle d'affichage des lignes des matières principales   
$resq2 = "SELECT * FROM cours INNER JOIN suivre ON cours.Code_cours=suivre.Code_cours WHERE Matricule = '$mat'";
  $resultat2 = $idcnx->query($resq2);  

  $moyenne = 0;
  $total = 0;
  $sumCoef = 0;
  
  while ($ligne2 = $resultat2->fetch (PDO::FETCH_ASSOC)){
    
    $total = $total + $ligne2['Notes']*$ligne2['Coefficient'];
    $sumCoef = $sumCoef + $ligne2['Coefficient'];

    echo
    '<tr>'.
    '<td>'.$ligne2['Intitule'].'</td>'.
    '<td>'.$ligne2['Coefficient'].'</td>'.
    '<td>'.$ligne2['Notes'].'</td>'.
    '<td>'.$ligne2['Notes']*$ligne2['Coefficient'].'</td>'.'</tr>';
  }
 
 
  $moyenne = $total/$sumCoef;
  echo
  '<tr>'.
  '<td>'.'Moyenne'.'</td>'.
  '<td colspan="3">'.$moyenne.'</td>'.'</tr>';
  
  ?>



 <!------------------les lignes des options-------------------------- -------------->


    </theed>
    </table>
    </div>
    <div class="ol-md-3 bg-info">
    </div>
  </div>
 
</div>


</body>
</html>