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
    $email = $_POST['email'];

    // Utilisation de prepared statements pour éviter les injections SQL
    $stmt = $conn->prepare("INSERT INTO Administrateur (nom, prenom, email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nom, $prenom, $email);

    if ($stmt->execute()) {
        echo "Administrateur ajouté avec succès";
    } else {
        echo "Erreur: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
