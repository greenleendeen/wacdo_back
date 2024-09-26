<?php

// Code d'initialisation 

// paramétrer l'afichage des erreurs
ini_set("display_errors", 1);       // Aficher les erreurs
error_reporting(E_ALL);             // Toutes les erreurs



//  la base de données dans la variable globale $bdd
global $bdd;
$bdd = new PDO("mysql:host=localhost;dbname=projets_exam-back_abache;charset=UTF8", "abache", "NCtYm5c+A");
// Pour debugger
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);


// librairies diverses
include_once "utils/model.php";

// Charger les objets du modèle de données
include_once "modeles/categorie.php";
include_once "modeles/produit.php";
include_once "modeles/user.php";
include_once "modeles/commande.php";
include_once "modeles/lignecommande.php";


// le fonctions des sessions
include_once "utils/session.php";
// Activer le mécanisme de session
session_activation();