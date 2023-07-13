<?php 
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
?>


<!-- Sidebar -->
<div class="sidebar" id="mySidebar">
<div class="side-header">
    <img src="./assets/images/logo.png" width="120" height="120" alt="Swiss Collection"> 
    <h5 style="margin-top:10px;">Hello <?php echo $_SESSION['nom']; ?></h5>
</div>

<hr style="border:1px solid; background-color:#8a7b6d; border-color:#3B3131;">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <a href="interface.php" ><i class="fa fa-home"></i> Dashboard</a>
    <a href="profil.php"   ><i class="fa fa-user"></i> Profil</a>
    <a href="formation.php"> <i class="fa fa-book"></i> Cours</a>
    <a href="note.php" >  <i class="fa fa-question"></i> Notes</a>
    <form action="chargerBulletin.php" method ="POST">
    <input  class="btn btn-action bg-info" name="imprimer" value="Imprimer le Bulletin" type="submit"/>
    </form><br>
   
  
  <!---->
</div>
 
<div id="main">
    <button class="openbtn" onclick="openNav()"><i class="fa fa-home"></i></button>
</div>


