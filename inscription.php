<?php

$database = "sport";
// Connexion à la base de données
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

$nom=isset($_POST["nom"])? $_POST["nom"] : "";
$prenom=isset($_POST["prenom"])? $_POST["prenom"] : "";
$adresseLigne1=isset($_POST["adresseLigne1"])? $_POST["adresseLigne1"] : "";
$adresseLigne2=isset($_POST["adresseLigne2"])? $_POST["adresseLigne2"] : "";
$email=isset($_POST["email"])? $_POST["email"] : "";
$mdp=isset($_POST["mdp"])? $_POST["mdp"] : "";
$ville=isset($_POST["ville"])? $_POST["ville"] : "";
$Postal=isset($_POST["Postal"])? $_POST["Postal"] : "";
$pays=isset($_POST["pays"])? $_POST["pays"] : "";
$telephone=isset($_POST["telephone"])? $_POST["telephone"] : "";
$carte=isset($_POST["carte"])? $_POST["carte"] : "";

if (isset($_POST["Soumettre"]))
{
    // Vérifier si tous les champs requis sont remplis
    if (!empty($_POST['nom']) && !empty($_POST['carte']) && !empty($_POST['telephone']) && !empty($_POST['pays']) && !empty($_POST['Postal']) && !empty($_POST['ville']) && !empty($_POST['mdp']) && !empty($_POST['prenom']) && !empty($_POST['adresseLigne1']) && !empty($_POST['adresseLigne2']) && !empty($_POST['email'])) {
        $nom = mysqli_real_escape_string($db_handle, $_POST['nom']);
        $carte = mysqli_real_escape_string($db_handle, $_POST['carte']);
        $telephone = mysqli_real_escape_string($db_handle, $_POST['telephone']);
        $pays = mysqli_real_escape_string($db_handle, $_POST['pays']);
        $Postal = mysqli_real_escape_string($db_handle, $_POST['Postal']);
        $ville = mysqli_real_escape_string($db_handle, $_POST['ville']);
        $mdp = mysqli_real_escape_string($db_handle, $_POST['mdp']);
        $prenom = mysqli_real_escape_string($db_handle, $_POST['prenom']);
        $adresseLigne1 = mysqli_real_escape_string($db_handle, $_POST['adresseLigne1']);
        $adresseLigne2 = mysqli_real_escape_string($db_handle, $_POST['adresseLigne2']);
        $email = mysqli_real_escape_string($db_handle, $_POST['email']);
        
        // Vérifier si le client existe déjà
        $check_query = "SELECT * FROM Client WHERE telephone = '$telephone'";
        $check_result = mysqli_query($db_handle, $check_query);
        
        if (mysqli_num_rows($check_result) > 0) {
            echo "<h2>Ce compte existe déjà.</h2>";
        } else {
            // Insérer le client dans la base de données
            $insert_query = "INSERT INTO Client (nom, prenom, adresseLigne1, adresseLigne2, email, Postal, Pays, telephone) VALUES ('$nom', '$prenom', '$adresseLigne1', '$adresseLigne2', '$email', '$Postal', '$Pays', '$telephone')";
            if (mysqli_query($db_handle, $insert_query)) {
                echo "<h2>Inscription faite avec succès !</h2>";
            } else {
                echo "<h2>Erreur lors de l'inscription.</h2>";
            }
        }
    } else {
        echo "<h2>Veuillez remplir tous les champs.</h2>";
    }

}

?>