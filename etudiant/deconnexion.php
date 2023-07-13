<?php
 session_destroy();
 header("Location: index.php");
   session_start(); 
   if((!isset($_SESSION["matricule"])) && !(isset($_POST["MDP"]))){
       header("Location: index.php");}
    if(isset($_POST['deconnexion'])){
        // Vérifie si l'utilisateur est connecté
        if (isset($_SESSION['matricule']) && isset($_POST['MDPEtudiant'])) {
            // L'utilisateur est connecté, donc on le déconnecte
            unset($_SESSION['matricule']); // Supprime les données de session de l'utilisateur
            unset($_SESSION['MDPEtudiant']);
            session_destroy(); // Détruit la session
        
            // Redirige vers la page de connexion ou toute autre page de votre choix
            header("Location: index.php");
            exit();
        } else {
            // Si l'utilisateur n'est pas connecté, redirige-le vers la page de connexion ou toute autre page de votre choix
            header("Location: index.php");                        
            exit();}
    }
    

?>