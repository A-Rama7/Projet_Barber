<?php
//--------- BDD


$pdo = new PDO('mysql:host=localhost;dbname=the_barber', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
//--------- SESSION
session_start();
 
//--------- CHEMIN
define("RACINE_SITE","/PROJET_BARBER/");
 
//--------- VARIABLES
$contenu = '';
 
//--------- AUTRES INCLUSIONS
require_once("fonction.inc.php");