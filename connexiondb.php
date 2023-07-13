<?php

    $nomUtilisateur = "root";
    $motDepasse ="";
    $serveur = "localhost";
    $BD = "be_web_ept";
    $DSN ="mysql:host=".$serveur.";dbname=".$BD.";charset=utf8";
    try{
        $idcnx = new PDO($DSN,$nomUtilisateur,$motDepasse);
    }catch(Exception $e){
        echo "connexion echouée",$e->getMessage();
        die();
    }
    //echo "connexion OK".$serveur."et a la BD".$BD;

?>