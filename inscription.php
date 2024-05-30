<?php
// Start the session
session_start();
?>

<?php

$database = "sport";
// Connexion à la base de données
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);
if ($db_found){
    if (isset($_POST["soumettre"]))
    {
        // Vérifier si tous les champs requis sont remplis
        if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['adresseLigne1']) && !empty($_POST['adresseLigne2']) && !empty($_POST['email']) && !empty($_POST['mot_de_passe']) && !empty($_POST['ville']) && !empty($_POST['postal']) && !empty($_POST['pays']) && !empty($_POST['carte_etudiante']) && !empty($_POST['telephone'])) {
            $nom = mysqli_real_escape_string($db_handle, $_POST['nom']);
            $prenom = mysqli_real_escape_string($db_handle, $_POST['prenom']);
            $adresseLigne1 = mysqli_real_escape_string($db_handle, $_POST['adresseLigne1']);
            $adresseLigne2 = mysqli_real_escape_string($db_handle, $_POST['adresseLigne2']);
            $email = mysqli_real_escape_string($db_handle, $_POST['email']);
            $mot_de_passe = mysqli_real_escape_string($db_handle, $_POST['mot_de_passe']);
            $ville = mysqli_real_escape_string($db_handle, $_POST['ville']);
            $postal = mysqli_real_escape_string($db_handle, $_POST['postal']);
            $pays = mysqli_real_escape_string($db_handle, $_POST['pays']);
            $carte_etudiante = mysqli_real_escape_string($db_handle, $_POST['carte_etudiante']);
            $telephone = mysqli_real_escape_string($db_handle, $_POST['telephone']);
            
            // Vérifier si le client existe déjà
            $check_query = "SELECT * FROM client WHERE telephone = '$telephone'";
            $check_result = mysqli_query($db_handle, $check_query);
            
            if (mysqli_num_rows($check_result) > 0)
            {
                
                echo "<h2>Ce compte existe déjà.</h2>";
            }
            else
            {
                // Insérer le client dans la base de données
                $insert_query = "INSERT INTO client (nom, prenom, adresseLigne1, adresseLigne2, email, mot_de_passe, ville, postal, pays, carte_etudiante, telephone) VALUES ('$nom', '$prenom', '$adresseLigne1', '$adresseLigne2', '$email', '$mot_de_passe', '$ville', '$postal', '$pays', '$carte_etudiante', '$telephone')";
                if (mysqli_query($db_handle, $insert_query))
                {
                    echo "<h2>Inscription faite avec succès !</h2>";
                }
                else
                {
                    echo "<h2>Erreur lors de l'inscription.</h2>";
                }
            }
        }
        else
        {
            echo "<h2>Veuillez remplir tous les champs requis.</h2>";
        }
    }
}
else
{
    echo "Database not found.";
}

mysqli_close($db_handle);
?>
