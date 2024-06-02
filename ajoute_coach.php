<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Sport";

// Création de la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("La connexion a échoué: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $photo = $_POST['photo'];
    $specialite = $_POST['specialite'];
    $video = $_POST['video'];
    $cv = $_POST['cv'];
    $disponibilite = $_POST['disponibilite'];
    $email = $_POST['email'];
    $mot_de_passe = $_POST['mot_de_passe'];
    $telephone = $_POST['telephone'];

    $sql = "INSERT INTO PersonnelSport (nom, prenom, photo, specialite, video, CV, disponibilite, email, mot_de_passe, telephone) 
            VALUES ('$nom', '$prenom', '$photo', '$specialite', '$video', '$cv', '$disponibilite', '$email', '$mot_de_passe', '$telephone')";

    if ($conn->query($sql) === TRUE) {
        echo "Nouveau coach ajouté avec succès";
    } else {
        echo "Erreur: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
