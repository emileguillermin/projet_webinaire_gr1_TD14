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
        if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['mot_de_passe'])) {
            $nom = mysqli_real_escape_string($db_handle, $_POST['nom']);
            $prenom = mysqli_real_escape_string($db_handle, $_POST['prenom']);
            $email = mysqli_real_escape_string($db_handle, $_POST['email']);
            $mot_de_passe = mysqli_real_escape_string($db_handle, $_POST['mot_de_passe']);
            
            // Vérifier si le coach existe déjà
            $check_query = "SELECT * FROM administrateur WHERE email = '$email'";
            $check_result = mysqli_query($db_handle, $check_query);
            
            if (mysqli_num_rows($check_result) > 0) {
                
                echo "<h2>Ce compte coach existe déjà.</h2>";
            } else {
                // Insérer le client dans la base de données
                $insert_query = "INSERT INTO administrateur (nom, prenom, email, mot_de_passe) VALUES ('$nom', '$prenom', '$email', '$mot_de_passe')";
                if (mysqli_query($db_handle, $insert_query)) {
                    echo "<h2>Inscription admin faite avec succès !</h2>";
                } else {
                    echo "<h2>Erreur lors de l'inscription.</h2>";
                }
            }
        } else {
            echo "<h2>Veuillez remplir tous les champs requis.</h2>";
        }
    }
}else {
    echo "Database not found.";
}

mysqli_close($db_handle);
?>
