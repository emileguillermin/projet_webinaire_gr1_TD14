<?php

$database="Sport";
//identifier votre serveur, login et mot de passe
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

$nom=isset($_POST["nom"])? $_POST["nom"] : "";
$prenom=isset($_POST["prenom"])? $_POST["prenom"] : "";
$adresseLigne1=isset($_POST["adresseLigne1"])? $_POST["adresseLigne1"] : "";
$adresseLigne2=isset($_POST["adresseLigne2"])? $_POST["adresseLigne2"] : "";
$email=isset($_POST["email"])? $_POST["email"] : "";
$mdp=isset($_POST["mdp"])? $_POST["mdp"] : "";
$ville=isset($_POST["ville"])? $_POST["ville"] : "";
$codePostal=isset($_POST["codePostal"])? $_POST["codePostal"] : "";
$pays=isset($_POST["pays"])? $_POST["pays"] : "";
$telephone=isset($_POST["telephone"])? $_POST["telephone"] : "";
$carte=isset($_POST["carte"])? $_POST["carte"] : "";

if (isset($_POST["Bouton"]))
//{
    if($db_found)
    {
        $sql = "INSERT INTO Client (nom, prenom, adresseLigne1, adresseLigne1, email, Ville, CodePostal, Pays, telephone, Carte)
        $sql=$sql."VALUES('$nom','$prenom','$adresseLigne1','$adresseLigne2','$email','$ville','$codePostal','$pays','$telephone','$carte')";
        $resultat=mysqli_query($db_handle, $sql);
        if($resultat)
        {
            echo "Client ajouté avec succès!<br>";
            echo "Nom : $nom <br>";
            echo "Prénom : $prenom <br>";
            echo "Adresse : $adresseLigne1 $adresseLigne2 <br>";
            echo "Email : $email <br>";
            echo "Ville : $ville <br>";
            echo "Code Postal : $codePostal <br>";
            echo "Pays : $pays <br>";
            echo "Téléphone : $telephone <br>";
            echo "Carte : $carte <br>";
        }
        else
        {
            echo "Erreur lors de l'ajout du client à la base de données.<br>";
        }
//}
    else 
    {
        echo "Database not Found";
    }
    mysqli_close($db_handle);
    header('location : inscription.html');  /* Permet de revenir directement à la page
?>