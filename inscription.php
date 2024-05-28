<?php
$database="Sport";
//identifier votre serveur, login et mot de passe
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

$nom=isset($_POST["nom"])? $_POST["nom"] : "";
$prenom=isset($_POST["prenom"])? $_POST["prenom"] : "";
$adresseLigne1=isset($_POST["adresseLigne1"])? $_POST["adresseLigne1"] : "";
$adresseLigne2=isset($_POST["adresseLigne2"])? $_POST["adresseLigne2"] : "";
$Ville=isset($_POST["Ville"])? $_POST["Ville"] : "";
$codePostal=isset($_POST["codePostal"])? $_POST["codePostal"] : "";
$telephone=isset($_POST["telephone"])? $_POST["telephone"] : "";
