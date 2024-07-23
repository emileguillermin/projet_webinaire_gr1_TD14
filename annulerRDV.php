<?php

$database = "sport";
$servername = "localhost";
$username = "root";
$password = "";
$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection échouée: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['annuler']))
{
    $ID_reservation= $_POST['reservation_id'];

    // Supprimer la réservation
    $sql = "DELETE FROM Reservation WHERE ID_reservation = $ID_reservation";
    $sql2 = "UPDATE Disponibilite d JOIN Reservation r ON d.Jour = r.jour AND d.Heure_Debut = r.heure SET d.Statut = 'Disponible' WHERE r.ID_reservation = $ID_reservation";
    $conn->query($sql2);
    if($conn->query($sql))
    {
        echo '<h2>Réservation faite avec succès<h2>';
    }
    // Rediriger vers la page principale après l'annulation
    header("Location: afficheRDV.php");
    exit();
}

$conn->close();
?>