<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sport";

// Création de la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("La connexion a échoué: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];

    // Utilisation de prepared statements pour éviter les injections SQL
    $stmt = $conn->prepare("DELETE FROM PersonnelSport WHERE nom = ?");
    $stmt->bind_param("s", $nom);

    if ($stmt->execute()) {
        echo "Coach supprimé avec succès";
    } else {
        echo "Erreur: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
